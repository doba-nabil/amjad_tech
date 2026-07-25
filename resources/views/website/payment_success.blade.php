@extends('website.layouts.app')

@section('title', __('dashboard.payment_success') ?? 'Payment Successful')

@section('content')
<div class="line_wrap">
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
    <div class="line_item"></div>
</div>

@include('website.partials.breadcrumb', ['title' => __('dashboard.payment_success') ?? 'Payment Successful', 'banner' => $settings->other_pages_banner ?? null])

<section class="checkout-area sec-mar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <i class="fas fa-check-circle text-success" style="font-size: 80px; margin-bottom: 20px;"></i>
                <h2>{{ __('dashboard.thank_you') ?? 'Thank You!' }}</h2>
                <p class="mt-3" style="font-size: 18px; color: #555;">{{ __('dashboard.payment_success_message') ?? 'Your payment was successful and your subscription is now active.' }}</p>
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="primary-btn3 py-3 px-4">{{ __('dashboard.back_to_home') ?? 'Back to Home' }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
