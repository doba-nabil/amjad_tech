@extends('website.layouts.app')

@section('title', __('dashboard.checkout') ?? 'Checkout')
@section('meta_description', __('dashboard.checkout_meta_desc') ?? 'Complete your subscription securely.')

@section('content')
<!-- Start line animation section -->
<div class="line_wrap">
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
</div>
<!-- End line animation section -->

@include('website.partials.breadcrumb', ['title' => __('dashboard.checkout') ?? 'Checkout', 'banner' => $settings->other_pages_banner ?? null])

<!-- Start checkout section -->
<section class="checkout-area sec-mar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="checkout-form-wrap wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="sec-title layout2 mb-4">
                        <span>{{ __('dashboard.subscribe_to') ?? 'Subscribe To' }}</span>
                        <h2>{{ $package->name }} ({{ ucfirst($package->type) }})</h2>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="checkout-form" class="checkout-form" action="{{ route('checkout.process') }}" method="post">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">{{ __('dashboard.name') ?? 'Full Name' }}</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('dashboard.name') ?? 'Enter your full name' }}" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">{{ __('dashboard.email') ?? 'Email Address' }}</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="{{ __('dashboard.email') ?? 'Enter your email' }}" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="phone_input_display" class="form-label">{{ __('dashboard.phone') ?? 'Phone Number' }}</label>
                                <input type="text" id="phone_input_display" class="form-control" placeholder="{{ __('dashboard.phone') ?? 'Enter your phone number' }}" value="{{ old('phone') }}" required>
                            </div>
                            
                            @php
                                $selectedCountryId = request('country_id') ?? old('country_id');
                                $selectedPrice = $package->prices->where('country_id', $selectedCountryId)->first();
                                
                                $isoCode = 'auto';
                                if ($selectedPrice) {
                                    $isoCode = match(strtoupper($selectedPrice->country->currency_code)) {
                                        'KWD' => 'kw',
                                        'SAR' => 'sa',
                                        'EGP' => 'eg',
                                        'AED' => 'ae',
                                        'QAR' => 'qa',
                                        'BHD' => 'bh',
                                        'OMR' => 'om',
                                        'JOD' => 'jo',
                                        'USD' => 'us',
                                        default => 'auto',
                                    };
                                }
                            @endphp
                            
                            <div class="col-12 mb-3" style="{{ $selectedPrice ? 'display: none;' : '' }}">
                                <label for="country_id" class="form-label">{{ __('dashboard.country') ?? 'Select Country' }}</label>
                                <select name="country_id" id="country_id" class="form-select" {{ $selectedPrice ? '' : 'required' }}>
                                    <option value="" disabled {{ !$selectedCountryId ? 'selected' : '' }}>{{ __('dashboard.select_country') ?? 'Select your country' }}</option>
                                    @foreach($package->prices as $price)
                                        <option value="{{ $price->country_id }}" {{ $selectedCountryId == $price->country_id ? 'selected' : '' }}>{{ $price->country->name }} - {{ $price->price }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            @if($selectedPrice)
                            <div class="col-12 mb-3">
                                <div class="p-3 bg-light border rounded">
                                    <strong>{{ __('dashboard.total') ?? 'Total Amount' }}:</strong> {{ $selectedPrice->price }} ({{ $selectedPrice->country->name }})
                                    <input type="hidden" name="country_id" value="{{ $selectedPrice->country_id }}">
                                </div>
                            </div>
                            @endif

                            <input type="hidden" name="payment_method" value="{{ $defaultPaymentMethod }}">

                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="primary-btn3 w-100 py-3 submit-btn" style="border: none; border-radius: 5px;">{{ __('dashboard.proceed_to_payment') ?? 'Proceed to Payment' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End checkout section -->
@endsection

@section('scripts')
<style>
    .iti {
        width: 100%;
    }
    .iti input {
        padding-left: 52px !important;
    }
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkoutForm = document.getElementById('checkout-form');
    var input = document.querySelector("#phone_input_display");
    var iti = null;
    
    if (input) {
        var isoCode = "{{ $isoCode }}";
        var options = {
            hiddenInput: "phone",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        };
        
        if (isoCode !== 'auto') {
            options.initialCountry = isoCode;
            options.onlyCountries = [isoCode];
        } else {
            options.initialCountry = "auto";
            options.excludeCountries = ["il"];
            options.geoIpLookup = function(callback) {
                fetch("https://ipapi.co/json")
                    .then(function(res) { return res.json(); })
                    .then(function(data) { callback(data.country_code); })
                    .catch(function() { callback("us"); });
            };
        }
        
        iti = window.intlTelInput(input, options);
        
        // On submit: sync hidden input (same as contact form)
        if (checkoutForm) {
            checkoutForm.addEventListener('submit', function(e) {
                var hiddenInput = checkoutForm.querySelector("input[name='phone']");
                if (hiddenInput && iti) {
                    hiddenInput.value = iti.getNumber();
                }
                const submitBtn = checkoutForm.querySelector('.submit-btn');
                if (submitBtn) {
                    submitBtn.innerHTML = '{{ __('dashboard.processing') ?? "Processing..." }}';
                    submitBtn.classList.add('disabled');
                }
            });
        }
    }
});
</script>
@endsection
