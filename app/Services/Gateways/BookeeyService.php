<?php

namespace App\Services\Gateways;

use App\Models\Purchase;
use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\Http;

class BookeeyService
{
    protected $merchantId;
    protected $secretKey;
    protected $isLive;

    public function __construct()
    {
        $settings = Setting::first();
        $paymentSettings = $settings ? $settings->payment_settings : [];
        
        $this->isLive = filter_var($paymentSettings['bookeey_live_mode'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $this->merchantId = $paymentSettings['bookeey_merchant_id'] ?? '';
        $this->secretKey = $paymentSettings['bookeey_secret_key'] ?? '';
    }

    public function getPaymentUrl(Purchase $purchase)
    {
        if (empty($this->merchantId) || empty($this->secretKey)) {
            throw new Exception('Bookeey credentials are not configured.');
        }

        // Bookeey API Endpoint
        $endpoint = $this->isLive ? 'https://www.bookeey.com/portal/api/requestPayment' : 'https://demo.bookeey.com/portal/api/requestPayment';

        $callbackURL = route('checkout.bookeey.callback', ['transaction_id' => $purchase->transaction_id]);
        
        // This is a generic representation of Bookeey API structure.
        // It should be adapted to the specific Bookeey API version used by the client.
        $payload = [
            'MerchantId' => $this->merchantId,
            'SecretKey' => $this->secretKey,
            'Amount' => $purchase->amount,
            'OrderId' => $purchase->transaction_id,
            'ReturnUrl' => $callbackURL,
            'CustomerName' => $purchase->name,
            'CustomerPhone' => $purchase->phone,
        ];

        // Usually Bookeey requires a form POST redirect, or it returns a Payment URL.
        // Assuming the API returns a payment URL for this integration:
        $response = Http::post($endpoint, $payload);
        
        if ($response->successful() && isset($response->json()['payment_url'])) {
            return $response->json()['payment_url'];
        }
        
        // If it doesn't return a URL, we might need to build an auto-submit form or redirect to error.
        throw new Exception('Failed to communicate with Bookeey gateway.');
    }
}
