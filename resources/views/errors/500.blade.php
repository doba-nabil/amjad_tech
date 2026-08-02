@extends('website.layouts.app')

@section('title', __('dashboard.error_500_title') ?? '500 - Server Error')

@section('content')
    @include('website.partials.breadcrumb', ['title' => __('dashboard.error_500_title') ?? '500 Error', 'banner' => $settings->other_pages_banner ?? null])
    
    <!-- Start back-to-home section -->
    <section class="back-to-home sec-pad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="error-wrapper">
                        <h3>{{ __('dashboard.error_500_text') ?? 'Server Error. Please try again later.' }}</h3>
                        <div class="home-btn" style="margin-top: 40px;">
                            <a href="{{ url('/') }}"><i class="bi bi-house-door" style="margin-right: 5px;"></i> {{ __('dashboard.back_to_home') ?? 'Back To Home' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End back-to-home section -->
@endsection
