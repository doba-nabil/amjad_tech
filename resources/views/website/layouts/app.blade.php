<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @if(app()->getLocale() == 'ar')
    <!-- Bootstrap RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    @else
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/') }}/css/bootstrap.min.css" rel="stylesheet">
    @endif
    <!-- Bootstrap Icon CSS -->
    <link href="{{ asset('assets/') }}/css/bootstrap-icons.css" rel="stylesheet">
    <!-- Fontawesome all CSS -->
    <link href="{{ asset('assets/') }}/css/all.min.css" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="{{ asset('assets/') }}/css/fontawesome.min.css" rel="stylesheet">
    <!-- Swiper slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/swiper-bundle.min.css">
    <!-- Magnific-popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/magnific-popup.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/animate.min.css">
    <!--  Style CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/style.css">
    @if(app()->getLocale() == 'ar')
    <!-- RTL Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif
    <!-- Title & SEO Meta -->
    <title>@yield('title', $settings->meta_title ?? $settings->site_name ?? 'KARTAA')</title>
    <meta name="description" content="@yield('meta_description', $settings->meta_description ?? '')">
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url('/sitemap.xml') }}">

    <!-- Open Graph (Social Media) -->
    <meta property="og:title" content="@yield('title', $settings->meta_title ?? $settings->site_name ?? 'KARTAA')">
    <meta property="og:description" content="@yield('meta_description', $settings->meta_description ?? '')">
    <meta property="og:image" content="@yield('meta_image', isset($settings->logo) ? Storage::url($settings->logo) : asset('assets/img/logo.svg'))">
    <meta property="og:type" content="website">
    <meta property="og:updated_time" content="{{ now()->toIso8601String() }}">

    <!-- Favicon & Apple Touch Icon -->
    <link rel="icon" type="image/png" href="{{ isset($settings->favicon) ? Storage::url($settings->favicon) : asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ isset($settings->favicon) ? Storage::url($settings->favicon) : asset('favicon.ico') }}">

    <!-- Schema.org -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "{{ $settings->site_name ?? 'KARTAA' }}",
      "url": "{{ url('/') }}",
      "logo": "{{ isset($settings->logo) ? url(Storage::url($settings->logo)) : asset('assets/img/logo.svg') }}",
      "description": "{{ $settings->meta_description ?? '' }}",
      "contactPoint": {
        "@@type": "ContactPoint",
        "telephone": "{{ $settings->phone ?? '' }}",
        "contactType": "customer service"
      }
    }
    </script>
    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
</head>

<body>
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Preloader End -->
    <!-- Start header section -->
    
@include('website.layouts.header')

<main class="creasoft-wrap">
@yield('content')
</main>

@include('website.partials.subscribe')
@include('website.layouts.footer')


        <!-- End footer section -->

    </main>
    <!-- End creasoft-wrap section -->


    <!--cursor design-->
    <div class="cursor"></div>
    <!--cursor design-->

    <!--  Main jQuery  -->
    <script src="{{ asset('assets/') }}/js/jquery-3.6.0.min.js"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="{{ asset('assets/') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/') }}/js/bootstrap.min.js"></script>
    <!-- Swiper slider JS -->
    <script src="{{ asset('assets/') }}/js/swiper-bundle.min.js"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('assets/') }}/js/waypoints.min.js"></script>
    <!-- Counterup JS -->
    <script src="{{ asset('assets/') }}/js/jquery.counterup.min.js"></script>
    <!-- Isotope  JS -->
    <script src="{{ asset('assets/') }}/js/isotope.pkgd.min.js"></script>
    <!-- Magnific-popup  JS -->
    <script src="{{ asset('assets/') }}/js/jquery.magnific-popup.min.js"></script>
    <!-- Wow JS -->
    <script src="{{ asset('assets/') }}/js/wow.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/') }}/js/custom.js"></script>
    <script src="{{ asset('assets/') }}/js/ajax-forms.js"></script>
    <!-- intl-tel-input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    @yield('scripts')

</body>

</html>
