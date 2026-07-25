<?php

namespace App\Services;

use App\Models\Package;
use App\Models\Purchase;
use App\Models\Setting;
use Illuminate\Support\Str;

class CheckoutService
{
    /**
     * Create a purchase record and return the redirect URL for the chosen gateway.
     */
    public function processCheckout(array $data)
    {
        $package = Package::findOrFail($data['package_id']);
        $countryId = $data['country_id'];
        
        $packagePrice = $package->prices()->where('country_id', $countryId)->first();
        if (!$packagePrice) {
            throw new \Exception('Pricing not available for this country.');
        }

        $purchase = Purchase::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'package_id' => $package->id,
            'country_id' => $countryId,
            'amount' => $packagePrice->price,
            'status' => 'pending',
            'payment_method' => $data['payment_method'],
            'transaction_id' => Str::uuid(), // Generate a unique reference
            'purchase_date' => now()->toDateString(),
        ]);

        return $this->getGatewayUrl($purchase);
    }

    protected function getGatewayUrl(Purchase $purchase)
    {
        if ($purchase->payment_method === 'myfatoorah') {
            return app(\App\Services\Gateways\MyFatoorahService::class)->getInvoiceUrl($purchase);
        }

        if ($purchase->payment_method === 'bookeey') {
            return app(\App\Services\Gateways\BookeeyService::class)->getPaymentUrl($purchase);
        }

        throw new \Exception('Invalid payment method selected.');
    }
    
    public function handleCallback($transactionId, $status)
    {
        $purchase = Purchase::where('transaction_id', $transactionId)->firstOrFail();
        
        if ($status === 'success') {
            $purchase->update(['status' => 'active']);
            
            try {
                \Illuminate\Support\Facades\Mail::to($purchase->email)->send(new \App\Mail\PaymentSuccessMail($purchase));
            } catch (\Exception $e) {
                \Log::error('Failed to send payment success email: ' . $e->getMessage());
            }
        } else {
            $purchase->update(['status' => 'failed']);
        }
        
        return $purchase;
    }
}
