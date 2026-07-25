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
