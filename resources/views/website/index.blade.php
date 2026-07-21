@extends('website.layouts.app')

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

        <!-- Start hero-area section -->
        <section class="hero-area">
            <div class="ken-burns-slideshow">
                <img src="{{ asset('assets/') }}/img/hero-banner.jpg" alt="image">
            </div>
            <div class="verticale-social">
                <ul class="vertical-media">
                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                    <li><a href="https://www.instagram.com/">Instagram</a></li>
                    <li><a href="https://www.linkedin.com/">Linkedin</a></li>
                </ul>
            </div>
            <div class="hero-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero-content">
                                <h1>Creative & Minimal<span>It Agency.</span></h1>
                                <p>Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor. ol Duis a orci nunc. Suspendisse ac convallis sapien, quis commodo libero. Donec nec dui luctus, pellentesque lacus sed, mollis leo.</p>
                                <div class="buttons">
                                    <div class="cmn-btn">
                                        <div class="line-1"></div>
                                        <div class="line-2"></div>
                                        <a href="about.html">About Us</a>
                                    </div>
                                    <div class="cmn-btn layout-two">
                                        <div class="line-1"></div>
                                        <div class="line-2"></div>
                                        <a href="project.html">See Project</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End hero-area section -->

        <!-- Start services-area section -->
        @if($settings->show_services_section && $services->isNotEmpty())
<section class="services-area sec-mar">
            <div class="container">
                <div class="title-wrap wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="sec-title">
                        <span>{{ $settings->home_services_title ?? "Our Solutions" }}</span>
                        <h2>{{ $settings->home_services_subtitle ?? "Services" }}</h2>
                        <p>{{ $settings->home_services_text ?? "Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor." }}</p>
                    </div>
                </div>
                <div class="swiper services-slider">
                    <div class="swiper-wrapper">
@foreach($services as $service)
                        <div class="swiper-slide wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="single-service">
                                <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <div class="icon">
                                    <img src="{{ isset($service->image) ? Storage::url($service->image) : asset('assets/img/icons/service-icon-1.png') }}" alt="">
                                </div>
                                <h4>{{ $service->title }}</h4>
                                <p>{{ Str::limit(strip_tags($service->content), 80) }}</p>
                                <div class="read-btn">
                                    <a href="{{ route('contact') }}"><i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
@endforeach
</div>
<div class="swiper-pagination d-md-none d-md-block"></div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
@endif
        <!-- End services-area section -->

        <!-- Start about-area section -->
        <section class="about-area sec-mar-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 or-2 wow animate fadeIn" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="sec-title layout2">
                            <span>Get To Know</span>
                            <h2>About Us</h2>
                        </div>
                        <div class="about-left">
                            <h3>We do design, code & develop Software finally launch.</h3>
                            <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec dolor. Class onlin aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia placerat felis non aliquam.</p>
                            <div class="company-since">
                                <div class="company-logo">
                                    <img src="{{ asset('assets/') }}/img/logo-dark.svg" alt="">
                                </div>
                                <strong>#1</strong>
                                <h4>Best Creative IT Agency And Solutions <span>Since 2005.</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 or-1 wow animate fadeIn" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about-right">
                            <div class="banner-1">
                                <img src="{{ asset('assets/') }}/img/about-baner-1.jpg" alt="">
                            </div>
                            <div class="banner-2">
                                <img src="{{ asset('assets/') }}/img/about-baner-2.jpg" alt="">
                                <div class="banner2-inner">
                                    <div class="play">
                                        <a class="video-popup" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about-area section -->

        <!-- Start features-area section -->
        <section class="features-area">
            <div class="container">
                <div class="title-wrap  wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="sec-title white">
                        <span>Care Study</span>
                        <h2>Features</h2>
                        <p>Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor. on Duis a orci nunc. Suspendisse ac convallis sapien, quis commodo libero.</p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="single-feature">
                            <div class="feature-inner">
                                <div class="icon">
                                    <img src="{{ asset('assets/') }}/img/icons/feature-icon-1.png" alt="">
                                </div>
                                <span class="counter">150</span><sup>+</sup>
                                <h4>Project Completed</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="single-feature">
                            <div class="feature-inner">
                                <div class="icon">
                                    <img src="{{ asset('assets/') }}/img/icons/feature-icon-2.png" alt="">
                                </div>
                                <span class="counter">250</span><sup>+</sup>
                                <h4>Satisfied Clients</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow animate fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="single-feature">
                            <div class="feature-inner">
                                <div class="icon">
                                    <img src="{{ asset('assets/') }}/img/icons/feature-icon-3.png" alt="">
                                </div>
                                <span class="counter">50</span><sup>+</sup>
                                <h4>Expert Teams</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 wow animate fadeInUp" data-wow-delay="800ms" data-wow-duration="1500ms">
                        <div class="single-feature">
                            <div class="feature-inner">
                                <div class="icon">
                                    <img src="{{ asset('assets/') }}/img/icons/feature-icon-4.png" alt="">
                                </div>
                                <span class="counter">28</span><sup>+</sup>
                                <h4>Win Awards</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End features-area section -->

        <!-- Start project-area section -->
        @if($settings->show_projects_section && $projects->isNotEmpty())
<section class="project-area sec-mar">
            <div class="container">
                <div class="title-wrap">
                    <div class="sec-title">
                        <span>{{ $settings->home_projects_title ?? "Project" }}</span>
                        <h2>{{ $settings->home_projects_subtitle ?? "Look at my work" }}</h2>
                        <p>{{ $settings->home_projects_text ?? "Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor." }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="isotope-menu">
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".ui">UI/UX</li>
                            <li data-filter=".web">Web Design</li>
                            <li data-filter=".developing">Developing</li>
                            <li data-filter=".graphic">Graphic Design</li>
                        </ul>
                    </div>
                </div>
                <div class="row g-4 project-items">
                    <div class="col-md-6 col-lg-4 single-item graphic ui">
                        <div class="item-img">
                            <a href="project.html"><img src="{{ asset('assets/') }}/img/project/project-1.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>Software</span>
                            <h4>Desktop Mockup</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item developing web">
                        <div class="item-img">
                            <a href="project.html"><img src="{{ asset('assets/') }}/img/project/project-2.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>Template</span>
                            <h4>Creative Agency</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item developing">
                        <div class="item-img">
                            <a href="project.html"><img src="{{ asset('assets/') }}/img/project/project-3.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>App</span>
                            <h4>Mobile Crypto Wallet</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item graphic">
                        <div class="item-img">
                            <a href="project.html"><img src="{{ asset('assets/') }}/img/project/project-4.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>UI Kit</span>
                            <h4>E-Shop Ecommerce</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item ui">
                        <div class="item-img">
                            <a href="project.html"><img src="{{ asset('assets/') }}/img/project/project-5.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>Graphic</span>
                            <h4>Art Deco Cocktails</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item web">
                        <div class="item-img">
                            <a href="project.html"><img src="{{ asset('assets/') }}/img/project/project-6.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>3D Design</span>
                            <h4>Low poly Base mesh</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endif
        <!-- End project-area section -->

        <!-- Start our-partner section -->
        <section class="our-partner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="sec-title white layout2">
                            <span>Satisfied Client</span>
                            <h2>Our Partner</h2>
                            <div class="-partnerslider-navigator">
                                <div class="swiper-button-prev-c"><i class="bi bi-chevron-left"></i></div>
                                <div class="swiper-button-next-c"><i class="bi bi-chevron-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="swiper partner-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-partner">
                                        <img src="{{ asset('assets/') }}/img/partner/partner-1.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-partner">
                                        <img src="{{ asset('assets/') }}/img/partner/partner-2.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-partner">
                                        <img src="{{ asset('assets/') }}/img/partner/partner-3.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-partner">
                                        <img src="{{ asset('assets/') }}/img/partner/partner-4.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-partner">
                                        <img src="{{ asset('assets/') }}/img/partner/partner-5.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End our-partner section -->

        <!-- Start priceing-plan section -->
        <section class="priceing-plan sec-mar">
            <div class="container">
                <div class="title-wrap">
                    <div class="sec-title">
                        <span>Getting Start</span>
                        <h2>Pricing Plan</h2>
                        <p>Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor. on Duis a orci nunc. Suspendisse ac convallis sapien, quis commodo libero.</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="price-table-tab">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pay Monthly</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Pay Yearly</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="price-box">
                                    <h3>Small Business</h3>
                                    <span>Single Business</span>
                                    <strong>$15.99<sub>/Per Month</sub></strong>
                                    <ul class="item-list">
                                        <li><i class="bi bi-check"></i>10 Pages Responsive Website</li>
                                        <li><i class="bi bi-check"></i>5PPC Campaigns</li>
                                        <li><i class="bi bi-check"></i>10 SEO Keyword</li>
                                        <li><i class="bi bi-check"></i>5 Facebook Camplaigns</li>
                                        <li><i class="bi bi-check"></i>2 Video Camplaigns</li>
                                    </ul>
                                    <div class="price-btn">
                                        <div class="line-1"></div>
                                        <div class="line-2"></div>
                                        <a href="contact.html">Pay Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                                <div class="price-box">
                                    <h3>Professional</h3>
                                    <span>Small team</span>
                                    <strong>$99.99<sub>/Per Month</sub></strong>
                                    <ul class="item-list">
                                        <li><i class="bi bi-check"></i>10 Pages Responsive Website</li>
                                        <li><i class="bi bi-check"></i>5PPC Campaigns</li>
                                        <li><i class="bi bi-check"></i>10 SEO Keyword</li>
                                        <li><i class="bi bi-check"></i>5 Facebook Camplaigns</li>
                                        <li><i class="bi bi-check"></i>2 Video Camplaigns</li>
                                    </ul>
                                    <div class="price-btn">
                                        <div class="line-1"></div>
                                        <div class="line-2"></div>
                                        <a href="contact.html">Pay Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="price-box">
                                    <h3>Enterprice</h3>
                                    <span>Large Team</span>
                                    <strong>$120.99<sub>/Per Month</sub></strong>
                                    <ul class="item-list">
                                        <li><i class="bi bi-check"></i>10 Pages Responsive Website</li>
                                        <li><i class="bi bi-check"></i>5PPC Campaigns</li>
                                        <li><i class="bi bi-check"></i>10 SEO Keyword</li>
                                        <li><i class="bi bi-check"></i>5 Facebook Camplaigns</li>
                                        <li><i class="bi bi-check"></i>2 Video Camplaigns</li>
                                    </ul>
                                    <div class="price-btn">
                                        <div class="line-1"></div>
                                        <div class="line-2"></div>
                                        <a href="contact.html">Pay Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="price-box">
                                    <h3>Small Business</h3>
                                    <span>Single Business</span>
                                    <strong>$35.99<sub>/Per Year</sub></strong>
                                    <ul class="item-list">
                                        <li><i class="bi bi-check"></i>10 Pages Responsive Website</li>
                                        <li><i class="bi bi-check"></i>5PPC Campaigns</li>
                                        <li><i class="bi bi-check"></i>10 SEO Keyword</li>
                                        <li><i class="bi bi-check"></i>5 Facebook Camplaigns</li>
                                        <li><i class="bi bi-check"></i>2 Video Camplaigns</li>
                                    </ul>
                                    <div class="price-btn">
                                        <div class="line-1"></div>
                                        <div class="line-2"></div>
                                        <a href="contact.html">Pay Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                                <div class="price-box">
                                    <h3>Professional</h3>
                                    <span>Small team</span>
                                    <strong>$199.99<sub>/Per Year</sub></strong>
                                    <ul class="item-list">
                                        <li><i class="bi bi-check"></i>10 Pages Responsive Website</li>
                                        <li><i class="bi bi-check"></i>5PPC Campaigns</li>
                                        <li><i class="bi bi-check"></i>10 SEO Keyword</li>
                                        <li><i class="bi bi-check"></i>5 Facebook Camplaigns</li>
                                        <li><i class="bi bi-check"></i>2 Video Camplaigns</li>
                                    </ul>
                                    <div class="price-btn">
                                        <div class="line-1"></div>
                                        <div class="line-2"></div>
                                        <a href="contact.html">Pay Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="price-box">
                                    <h3>Enterprice</h3>
                                    <span>Large Team</span>
                                    <strong>$220.99<sub>/Per Year</sub></strong>
                                    <ul class="item-list">
                                        <li><i class="bi bi-check"></i>10 Pages Responsive Website</li>
                                        <li><i class="bi bi-check"></i>5PPC Campaigns</li>
                                        <li><i class="bi bi-check"></i>10 SEO Keyword</li>
                                        <li><i class="bi bi-check"></i>5 Facebook Camplaigns</li>
                                        <li><i class="bi bi-check"></i>2 Video Camplaigns</li>
                                    </ul>
                                    <div class="price-btn">
                                        <div class="line-1"></div>
                                        <div class="line-2"></div>
                                        <a href="contact.html">Pay Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End priceing-plan section -->

        <!-- Start testimonial-area section -->
        
        <!-- End testimonial-area section -->

        <!-- Start our-team section -->
        
        <!-- End our-team section -->

        <!-- Start blog-area section -->
        @if($settings->show_blogs_section && $blogs->isNotEmpty())
<section class="blog-area">
            <div class="container">
                <div class="title-wrap -6 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="sec-title">
                        <span>{{ $settings->home_blog_title ?? "All Blog" }}</span>
                        <h2>{{ $settings->home_blog_subtitle ?? "Latest Post" }}</h2>
                        <p>{{ $settings->home_blog_text ?? "Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor." }}</p>
                    </div>
                </div>
                <div class="row gy-4">
                    <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="single-blog">
                            <div class="blog-thumb">
                                <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-1.jpg" alt=""></a>
                                <div class="tag">
                                    <a href="project.html">UI/UX</a>
                                </div>
                            </div>
                            <div class="blog-inner">
                                <div class="author-date">
                                    <a href="#">By, Admin</a>
                                    <a href="#">22.02.2022</a>
                                </div>
                                <h4><a href="blog-details.html">Quisque malesuada sapien and Donec sed nunc.</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="single-blog">
                            <div class="blog-thumb">
                                <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-2.jpg" alt=""></a>
                                <div class="tag">
                                    <a href="project.html">Software</a>
                                </div>
                            </div>
                            <div class="blog-inner">
                                <div class="author-date">
                                    <a href="#">By, Admin</a>
                                    <a href="#">22.02.2022</a>
                                </div>
                                <h4><a href="blog-details.html">Suspendisse pretium magna qu nisl egestas porttitor.</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow animated fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="single-blog">
                            <div class="blog-thumb">
                                <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-3.jpg" alt=""></a>
                                <div class="tag">
                                    <a href="project.html">Dashbord</a>
                                </div>
                            </div>
                            <div class="blog-inner">
                                <div class="author-date">
                                    <a href="#">By, Admin</a>
                                    <a href="#">22.02.2022</a>
                                </div>
                                <h4><a href="blog-details.html">In a augue sit amet erat Suspel eleifend suscipit issen.</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endif
        <!-- End blog-area section -->

        <!-- Start subscribe-newsletter section -->
        <section class="subscribe-newsletter sec-mar-top">
            <div class="container">
                <div class="news-letter-content">
                    <div class="row align-items-center">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="subscribe-cnt">
                                <span>Get In Touch</span>
                                <h3>Subscribe Our</h3>
                                <strong>Newsletter</strong>
                            </div>
                        </div>
                        <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="subscribe-form">
                                <form action="#" method="post">
                                    <input type="email" name="email" placeholder="Type Your Email">
                                    <input type="submit" value="connect">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End subscribe-newsletter section -->

        <!-- Start footer section -->
        
@endsection