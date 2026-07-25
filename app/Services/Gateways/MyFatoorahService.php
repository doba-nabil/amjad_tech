<?php

namespace App\Services\Gateways;

use App\Models\Purchase;
use MyFatoorah\Library\MyFatoorah;
use MyFatoorah\Library\API\Payment\MyFatoorahPayment;
use App\Models\Setting;
use Exception;

class MyFatoorahService
{
    protected $mfConfig;

    public function __construct()
    {
        $settings = Setting::first();
        $paymentSettings = $settings ? $settings->payment_settings : [];
        
        $liveMode = filter_var($paymentSettings['myfatoorah_live_mode'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $apiKey = $liveMode ? ($paymentSettings['myfatoorah_production_key'] ?? '') : ($paymentSettings['myfatoorah_test_key'] ?? '');
        $countryCode = $paymentSettings['myfatoorah_country_code'] ?? 'KWT';

        $this->mfConfig = [
            'apiKey'      => $apiKey,
            'isTest'      => !$liveMode,
            'countryCode' => $countryCode,
        ];
    }

    public function getInvoiceUrl(Purchase $purchase)
    {
        if (empty($this->mfConfig['apiKey'])) {
            throw new Exception('MyFatoorah API key is not configured.');
        }

        $callbackURL = route('checkout.myfatoorah.callback', ['transaction_id' => $purchase->transaction_id]);

        $customerMobile = $purchase->phone;
        $mobileCountryCode = '';
        
        try {
            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            $phoneNumber = $phoneUtil->parse($purchase->phone, null);
            $mobileCountryCode = '+' . $phoneNumber->getCountryCode();
            $customerMobile = $phoneNumber->getNationalNumber();
        } catch (\Exception $e) {
            // fallback
        }

        $curlData = [
            'CustomerName'       => $purchase->name,
            'InvoiceValue'       => $purchase->amount,
            'DisplayCurrencyIso' => 'KWD', // Or dynamically mapped from country if needed
            'MobileCountryCode'  => $mobileCountryCode,
            'CustomerMobile'     => $customerMobile,
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callbackURL, // MyFatoorah uses the same callback and returns status in querystring
            'Language'           => app()->getLocale() == 'ar' ? 'ar' : 'en',
            'CustomerReference'  => $purchase->transaction_id,
        ];

        $mfObj = new MyFatoorahPayment($this->mfConfig);
        $paymentId = 0; // 0 is for standard invoice. 1 for knet.
        
        try {
            $payment = $mfObj->getInvoiceURL($curlData, $paymentId, $purchase->transaction_id, null);
            return $payment['invoiceURL'];
        } catch (\Exception $e) {
            throw new Exception('MyFatoorah Error: ' . $e->getMessage());
        }
    }
}
