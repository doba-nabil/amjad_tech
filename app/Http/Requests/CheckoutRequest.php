<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $isoCode = 'AUTO';
        
        if ($this->country_id) {
            $country = \App\Models\Country::find($this->country_id);
            if ($country) {
                $isoCode = match(strtoupper($country->currency_code)) {
                    'KWD' => 'KW',
                    'SAR' => 'SA',
                    'EGP' => 'EG',
                    'AED' => 'AE',
                    'QAR' => 'QA',
                    'BHD' => 'BH',
                    'OMR' => 'OM',
                    'JOD' => 'JO',
                    'USD' => 'US',
                    default => 'AUTO',
                };
                $this->merge(['country_iso_code' => $isoCode]);
            }
        }
        
        \Log::info('CheckoutRequest Prepared:', ['phone' => $this->phone, 'iso' => $isoCode]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'phone:AUTO'],
            'country_iso_code' => ['nullable', 'string'],
            'package_id' => ['required', 'exists:packages,id'],
            'country_id' => ['required', 'exists:countries,id'],
            'payment_method' => ['required', 'string', 'in:bookeey,myfatoorah'],
        ];
    }
    
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->package_id && ($this->email || $this->phone)) {
                $exists = \App\Models\Purchase::where('package_id', $this->package_id)
                    ->where('status', 'active')
                    ->where(function ($q) {
                        $q->where('email', $this->email)
                          ->orWhere('phone', $this->phone);
                    })
                    ->exists();
                    
                if ($exists) {
                    $validator->errors()->add('package_id', __('dashboard.already_subscribed') ?? 'You already have an active subscription for this package.');
                }
            }
        });
    }
}
