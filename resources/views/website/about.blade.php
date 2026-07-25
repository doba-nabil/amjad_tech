@extends('website.layouts.app')

@section('title', __('dashboard.about_us') ?? 'About Us')
@section('meta_description', __('dashboard.about_meta_desc') ?? 'Learn more about our company, our mission, and our values.')

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

        @include('website.partials.breadcrumb', ['title' => __('About'), 'banner' => $settings->other_pages_banner ?? null])

        <!-- Start why-choose section -->
        <section class="why-choose sec-mar wow animate fadeIn" data-wow-delay="200ms" data-wow-duration="1500ms">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="why-choose-left">
                            <div class="choose-banner1">
                                <img loading="lazy" src="{{ asset('assets/') }}/img/why-1.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                            </div>
                            <div class="choose-banner2">
                                <img loading="lazy" src="{{ asset('assets/') }}/img/why-2.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                <img loading="lazy" src="{{ asset('assets/') }}/img/why-3.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                            </div>
                            <div class="years">
                                <h5>20+</h5>
                                <span>Years</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="why-choose-right">
                            <div class="sec-title layout2">
                                <span>Why Choose</span>
                                <h2>We create experiences and partner for businesses ready to stand out in a fast-moving digital world.</h2>
                            </div>
                            <div class="counter-boxes">
                                <div class="count-box">
                                    <span class="counter">150</span><sup>+</sup>
                                    <h5>Project Completed</h5>
                                </div>
                                <div class="count-box">
                                    <span class="counter">250</span><sup>+</sup>
                                    <h5>Satisfied Clients</h5>
                                </div>
                                <div class="count-box">
                                    <span class="counter">50</span><sup>+</sup>
                                    <h5>Expert Teams</h5>
                                </div>
                            </div>
                            <p>- Proven Track Record With over 150 successful stories and 90+ satisfied clients, Hipsera has built a solid reputation for delivering impactful digital solutions.

- End-to-End Services
From branding and design to full-stack development and media production, Seven Media X offers everything your business needs under one roof.

- Innovative Technology
We stay ahead of the curve with cutting-edge solutions, including Web3 development and crypto marketing, tailored for the future of digital.

- Global Presence
Operating in both Canada and the Middle East, Seven Media X brings international expertise with local insight.

- Creative Excellence
Our work is driven by creativity, strategy, and a deep understanding of user experience—ensuring your brand stands out and performs.

- Client-Centered Approach
We treat every project as a partnership, delivering personalized solutions that align with your goals and vision.</p>
                            <div class="buttons-group">
                                <span>24/7 Support</span>
                                <span>Unique Design</span>
                                <span>Clean Code Develope</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End why-choose section -->

        <!-- Start about-area section -->
        <section class="about-area sec-mar-bottom wow animate slideInUp" data-wow-delay="200ms" data-wow-duration="1500ms" style="margin-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 or-2">
                        <div class="sec-title layout2">
                            <span>Get To Know</span>
                            <h2>About Us</h2>
                        </div>
                        <div class="about-left">
                            <h3>We do design, code & develop Software finally launch.</h3>
                            <p>Seven Media X is a creative and technology-driven company established in 2019, with a presence in both Canada and the Middle East. With over 150 successful stories, 90+ happy customers, and more than 120 delivered apps and websites, Hipsera is a trusted name in the digital space. The company specializes in branding, mobile application and website design and development, as well as media production—offering end-to-end solutions that elevate brand experiences. Seven Media X also leads in the blockchain space, providing Web3 development and crypto marketing services, making it a go-to partner for forward-thinking businesses looking to innovate and grow.</p>
                            <div class="company-since">
                                <div class="company-logo">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/logo-dark.svg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                </div>
                                <strong>#1</strong>
                                <h4>Best Creative IT Agency And Solutions <span>Since 2020.</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 or-1">
                        <div class="about-right">
                            <div class="banner-1">
                                <img loading="lazy" src="{{ asset('assets/') }}/img/about-baner-1.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                            </div>
                            <div class="banner-2">
                                <img loading="lazy" src="{{ asset('assets/') }}/img/about-baner-2.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
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
                <div class="title-wrap wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="sec-title white">
                        <span>Care Study</span>
                        <h2>Features</h2>
                        <p>Our journey is defined by real success, trusted partnerships, and results that make an impact.</p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="single-feature">
                            <div class="feature-inner">
                                <div class="icon">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/icons/feature-icon-1.png" alt="{{ $settings->site_name ?? 'Kartaa' }}">
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
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/icons/feature-icon-2.png" alt="{{ $settings->site_name ?? 'Kartaa' }}">
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
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/icons/feature-icon-3.png" alt="{{ $settings->site_name ?? 'Kartaa' }}">
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
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/icons/feature-icon-4.png" alt="{{ $settings->site_name ?? 'Kartaa' }}">
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

        <!-- Start history-area section -->
        <section class="history-area sec-mar">
            <div class="container">
                <div class="title-wrap">
                    <div class="sec-title">
                        <span>History</span>
                        <h2>Creasoft History</h2>
                    </div>
                </div>
                <div class="single-history">
                    <div class="history wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="circle">
                            <div class="inner"></div>
                        </div>
                        <div class="history-thumb">
                            <img loading="lazy" src="{{ asset('assets/') }}/img/timeline-1.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                        </div>
                    </div>
                    <div class="history wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="circle">
                            <div class="inner"></div>
                        </div>
                        <div class="history-cnt">
                            <div class="history-cnt-inner">
                                <span>2020</span>
                                <h4>We Are Open Our Office</h4>
                                <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec aptent taciti sociosqu ad litora torquent per conubia nostra,
                                    himenaeos. Praesent nec neque at dolor venenatis thoseaol Donec lacinia placerat felis non aliquam.Mauris nec justo ag euismod sit amet non ipsum. Praesent commodo at massa vitae enim velit. Ut ut posuere orci, id dapibus odio. himenaeos. Praesent nec neque at dolor venenatis thoseaol Donec lacinia placerat felis non aliquam.Mauris nec justo ag euismod sit amet non ipsum. Praesent commodo at massa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-history">
                    <div class="history wow animate fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="circle">
                            <div class="inner"></div>
                        </div>
                        <div class="history-cnt">
                            <div class="history-cnt-inner">
                                <span>2021</span>
                                <h4>We Work Hard for design</h4>
                                <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec aptent taciti sociosqu ad litora torquent per conubia nostra,
                                    himenaeos. Praesent nec neque at dolor venenatis thoseaol Donec lacinia placerat felis non aliquam.Mauris nec justo ag euismod sit amet non ipsum. Praesent commodo at massa vitae enim velit. Ut ut posuere orci, id dapibus odio. himenaeos. Praesent nec neque at dolor venenatis thoseaol Donec lacinia placerat felis non aliquam.Mauris nec justo ag euismod sit amet non ipsum. Praesent commodo at massa</p>
                            </div>
                        </div>
                    </div>
                    <div class="history wow animate fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="circle">
                            <div class="inner"></div>
                        </div>
                        <div class="history-thumb">
                            <img loading="lazy" src="{{ asset('assets/') }}/img/timeline-2.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                        </div>
                    </div>
                </div>
                <div class="single-history">
                    <div class="history wow animate fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="circle">
                            <div class="inner"></div>
                        </div>
                        <div class="history-thumb">
                            <img loading="lazy" src="{{ asset('assets/') }}/img/timeline-3.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                        </div>
                    </div>
                    <div class="history wow animate fadeInRight" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="circle">
                            <div class="inner"></div>
                        </div>
                        <div class="history-cnt">
                            <div class="history-cnt-inner">
                                <span>2022</span>
                                <h4>We Are Success And Win</h4>
                                <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec aptent taciti sociosqu ad litora torquent per conubia nostra,
                                    himenaeos. Praesent nec neque at dolor venenatis thoseaol Donec lacinia placerat felis non aliquam.Mauris nec justo ag euismod sit amet non ipsum. Praesent commodo at massa vitae enim velit. Ut ut posuere orci, id dapibus odio. himenaeos. Praesent nec neque at dolor venenatis thoseaol Donec lacinia placerat felis non aliquam.Mauris nec justo ag euismod sit amet non ipsum. Praesent commodo at massa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-history">
                    <div class="history wow animate fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="circle">
                            <div class="inner"></div>
                        </div>
                        <div class="history-cnt">
                            <div class="history-cnt-inner">
                                <span>2023</span>
                                <h4>Many Award Win</h4>
                                <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec aptent taciti sociosqu ad litora torquent per conubia nostra,
                                    himenaeos. Praesent nec neque at dolor venenatis thoseaol Donec lacinia placerat felis non aliquam.Mauris nec justo ag euismod sit amet non ipsum. Praesent commodo at massa vitae enim velit. Ut ut posuere orci, id dapibus odio. himenaeos. Praesent nec neque at dolor venenatis thoseaol Donec lacinia placerat felis non aliquam.Mauris nec justo ag euismod sit amet non ipsum. Praesent commodo at massa</p>
                            </div>
                        </div>
                    </div>
                    <div class="history wow animate fadeInRight" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="circle">
                            <div class="inner"></div>
                        </div>
                        <div class="history-thumb">
                            <img loading="lazy" src="{{ asset('assets/') }}/img/timeline-4.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End history-area section -->

        <!-- Start testimonial-area section -->
        <section class="testimonial-area">
            <div class="container-fluid p-0">
                <div class="title-wrap">
                    <div class="sec-title white">
                        <span>Testimonial</span>
                        <h2>Client Say About Us</h2>
                        <p>Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor. on Duis a orci nunc. Suspendisse ac convallis sapien, quis commodo libero.</p>
                    </div>
                </div>
                <div class="swiper testimonial-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="single-testimonial">
                                <div class="quote">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                                <h5>Martha Maldonado</h5>
                                <span>Executive Chairman</span>
                                <div class="stars">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec dolor. ani aptent taciti sociosqu ad litora torquent per conubia nostra, per sonic himenaeos. Praesent nec neque at dolor venenatis consectetur europ Donec lacinia placerat felis non aliquam.</p>
                                <div class="reviewer">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/reivewer.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-testimonial">
                                <div class="quote">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                                <h5>Martha Maldonado</h5>
                                <span>Executive Chairman</span>
                                <div class="stars">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec dolor. ani aptent taciti sociosqu ad litora torquent per conubia nostra, per sonic himenaeos. Praesent nec neque at dolor venenatis consectetur europ Donec lacinia placerat felis non aliquam.</p>
                                <div class="reviewer">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/reivewer-1.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-testimonial">
                                <div class="quote">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                                <h5>Martha Maldonado</h5>
                                <span>Executive Chairman</span>
                                <div class="stars">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec dolor. ani aptent taciti sociosqu ad litora torquent per conubia nostra, per sonic himenaeos. Praesent nec neque at dolor venenatis consectetur europ Donec lacinia placerat felis non aliquam.</p>
                                <div class="reviewer">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/reivewer.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-testimonial">
                                <div class="quote">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                                <h5>Martha Maldonado</h5>
                                <span>Executive Chairman</span>
                                <div class="stars">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec dolor. ani aptent taciti sociosqu ad litora torquent per conubia nostra, per sonic himenaeos. Praesent nec neque at dolor venenatis consectetur europ Donec lacinia placerat felis non aliquam.</p>
                                <div class="reviewer">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/reivewer-1.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-testimonial">
                                <div class="quote">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                                <h5>Martha Maldonado</h5>
                                <span>Executive Chairman</span>
                                <div class="stars">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <p>Integer purus odio, placerat nec rhoncus in, ullamcorper nec dolor. ani aptent taciti sociosqu ad litora torquent per conubia nostra, per sonic himenaeos. Praesent nec neque at dolor venenatis consectetur europ Donec lacinia placerat felis non aliquam.</p>
                                <div class="reviewer">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/reivewer.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination d-md-none d-md-block"></div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
        <!-- End testimonial-area section -->

        <!-- Start our-team section -->
        <section class="our-team sec-mar">
            <div class="container">
                <div class="title-wrap wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="sec-title">
                        <span>Our Team</span>
                        <h2>Meet Our Team</h2>
                        <p>Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor. on Duis a orci nunc. Suspendisse ac convallis sapien, quis commodo libero.</p>
                    </div>
                </div>
                <div class="swiper team-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="single-team">
                                <div class="member-img">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/team/team-1.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                    <svg width="185" height="299" viewBox="0 0 167 269" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25412 0.814453C1.68125 2.62384 0 5.61553 0 8.99991V269H167C167 269 47 269 66.5 112.171C75.5581 39.3209 20.2679 8.22409 4.25412 0.814453Z" fill="#191A1C" />
                                    </svg>
                                    <ul class="team-social">
                                        <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-inner">
                                    <h4>Thoren Okendhild</h4>
                                    <span>Executive Chairman</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="single-team">
                                <div class="member-img">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/team/team-2.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                    <svg width="185" height="299" viewBox="0 0 167 269" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25412 0.814453C1.68125 2.62384 0 5.61553 0 8.99991V269H167C167 269 47 269 66.5 112.171C75.5581 39.3209 20.2679 8.22409 4.25412 0.814453Z" fill="#191A1C" />
                                    </svg>
                                    <ul class="team-social">
                                        <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-inner">
                                    <h4>Lincoln Anthony</h4>
                                    <span>Software Engeenier</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide wow animate fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="single-team">
                                <div class="member-img">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/team/team-3.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                    <svg width="185" height="299" viewBox="0 0 167 269" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.25412 0.814453C1.68125 2.62384 0 5.61553 0 8.99991V269H167C167 269 47 269 66.5 112.171C75.5581 39.3209 20.2679 8.22409 4.25412 0.814453Z" fill="#191A1C" />
                                    </svg>
                                    <ul class="team-social">
                                        <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-inner">
                                    <h4>Adrian Eodri</h4>
                                    <span>UI/UX Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End our-team section -->

        <!-- Start blog-area section -->
        <section class="blog-area">
            <div class="container">
                <div class="title-wrap wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="sec-title">
                        <span>All Blog</span>
                        <h2>Latest Post</h2>
                        <p>Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor. on Duis a orci nunc. Suspendisse ac convallis sapien, quis commodo libero.</p>
                    </div>
                </div>
                <div class="row gy-4">
                    <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="single-blog">
                            <div class="blog-thumb">
                                <a href="blog-details.html"><img loading="lazy" src="{{ asset('assets/') }}/img/blog/blog-1.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}"></a>
                                <div class="tag">
                                    <a href="blog-details.html">UI/UX</a>
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
                                <a href="blog-details.html"><img loading="lazy" src="{{ asset('assets/') }}/img/blog/blog-2.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}"></a>
                                <div class="tag">
                                    <a href="blog-details.html">Software</a>
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
                    <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="single-blog">
                            <div class="blog-thumb">
                                <a href="blog-details.html"><img loading="lazy" src="{{ asset('assets/') }}/img/blog/blog-3.jpg" alt="{{ $settings->site_name ?? 'Kartaa' }}"></a>
                                <div class="tag">
                                    <a href="blog-details.html">Dashbord</a>
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

    </main>
    <!-- End creasoft-wrap section -->

    <!-- Start section -->
@endsection
