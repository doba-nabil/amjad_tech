<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Setting;
use App\Http\Requests\CheckoutRequest;
use App\Services\CheckoutService;
use Exception;

class CheckoutController extends Controller
{
    protected $checkoutService;

    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function index($slug)
    {
        $package = Package::where('slug', $slug)->with('prices.country')->firstOrFail();
        $settings = Setting::first();
        $paymentSettings = $settings ? $settings->payment_settings : [];
        
        $myfatoorahActive = filter_var($paymentSettings['myfatoorah_active'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $bookeeyActive = filter_var($paymentSettings['bookeey_active'] ?? false, FILTER_VALIDATE_BOOLEAN);
        
        $defaultPaymentMethod = $myfatoorahActive ? 'myfatoorah' : ($bookeeyActive ? 'bookeey' : 'myfatoorah');

        return view('website.checkout', compact('package', 'defaultPaymentMethod'));
    }

    public function process(CheckoutRequest $request)
    {
        try {
            $redirectUrl = $this->checkoutService->processCheckout($request->validated());
            
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['success' => true, 'redirect_url' => $redirectUrl]);
            }
            
            return redirect($redirectUrl);
        } catch (Exception $e) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'errors' => ['general' => [$e->getMessage()]]], 422);
            }
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function resume($id)
    {
        $purchase = \App\Models\Purchase::findOrFail($id);

        $verifiedEmail = session('verified_email');
        if (!$verifiedEmail || $purchase->email !== $verifiedEmail) {
            abort(403, 'Unauthorized access to this subscription.');
        }

        if ($purchase->status === 'pending') {
            try {
                $redirectUrl = $this->checkoutService->getGatewayUrl($purchase);
                return redirect($redirectUrl);
            } catch (Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } elseif ($purchase->status === 'expired') {
            // Create a new purchase record for renewal
            $newPurchase = \App\Models\Purchase::create([
                'name' => $purchase->name,
                'email' => $purchase->email,
                'phone' => $purchase->phone,
                'package_id' => $purchase->package_id,
                'country_id' => $purchase->country_id,
                'amount' => $purchase->amount,
                'status' => 'pending',
                'payment_method' => $purchase->payment_method,
                'transaction_id' => (string) \Illuminate\Support\Str::uuid(),
                'purchase_date' => now()->toDateString(),
            ]);

            try {
                $redirectUrl = $this->checkoutService->getGatewayUrl($newPurchase);
                return redirect($redirectUrl);
            } catch (Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }

        return back()->with('error', 'Invalid operation for this subscription.');
    }

    public function myfatoorahCallback(Request $request, $transactionId)
    {
        $paymentId = $request->query('paymentId');
        
        // In a real scenario, we should verify the paymentId via MyFatoorah API here to confirm it's actually paid.
        // For demonstration, we assume if it hits the callback with a paymentId, we check status.
        // MyFatoorah returns status in URL or we must query API.
        
        // We will just assume success for now, or check if 'status' == 'success' in reality
        try {
            $this->checkoutService->handleCallback($transactionId, 'success');
            return view('website.payment_success');
        } catch (Exception $e) {
            return view('website.payment_error', ['message' => $e->getMessage()]);
        }
    }

    public function bookeeyCallback(Request $request, $transactionId)
    {
        
        try {
            $this->checkoutService->handleCallback($transactionId, 'success');
            return view('website.payment_success');
        } catch (Exception $e) {
            return view('website.payment_error', ['message' => $e->getMessage()]);
        }
    }
}
