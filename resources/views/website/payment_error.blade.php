@extends('website.layouts.app')

@section('title', __('dashboard.payment_failed') ?? 'Payment Failed')

@section('content')
<div class="line_wrap">
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
</div>

@include('website.partials.breadcrumb', ['title' => __('dashboard.payment_failed') ?? 'Payment Failed'])

<section class="checkout-area sec-mar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <i class="fas fa-times-circle text-danger" style="font-size: 80px; margin-bottom: 20px;"></i>
                <h2>{{ __('dashboard.payment_failed') ?? 'Payment Failed' }}</h2>
                <p class="mt-3" style="font-size: 18px; color: #555;">{{ $message ?? __('dashboard.payment_failed_message') ?? 'An error occurred during the payment process. Please try again.' }}</p>
                <div class="mt-4">
                    <a href="{{ route('pricing') }}" class="primary-btn3 py-3 px-4">{{ __('dashboard.try_again') ?? 'Try Again' }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
