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

        @include('website.partials.breadcrumb', ['title' => __('Projects')])

        <!-- Start project-area section -->
        <section class="project-area sec-mar">
            <div class="container">
                <div class="title-wrap">
                    <div class="sec-title">
                        <span>Case Study</span>
                        <h2>Project</h2>
                        <p>Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor. on Duis a orci nunc. Suspendisse ac convallis sapien, quis commodo libero.</p>
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
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-1.jpg" alt=""></a>
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
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-2.jpg" alt=""></a>
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
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-3.jpg" alt=""></a>
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
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-4.jpg" alt=""></a>
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
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-5.jpg" alt=""></a>
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
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-6.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>3D Design</span>
                            <h4>Low poly Base mesh</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item developping">
                        <div class="item-img">
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-7.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>Video</span>
                            <h4>Animation Studio</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item ui">
                        <div class="item-img">
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-8.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>Motion</span>
                            <h4>Motion Graphics</h4>
                            <div class="view-btn">
                                <a href="project.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item developing">
                        <div class="item-img">
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-9.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>App</span>
                            <h4>Mobile Crypto Wallet</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item web">
                        <div class="item-img">
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-10.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>UI/UX</span>
                            <h4>Design Demo</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item graphic">
                        <div class="item-img">
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-11.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>Graphic</span>
                            <h4>Art Deco Cocktails</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 single-item ui">
                        <div class="item-img">
                            <a href="project-details.html"><img src="{{ asset('assets/') }}/img/project/project-12.jpg" alt=""></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span>UI Kit</span>
                            <h4>E-Shop Ecommerce</h4>
                            <div class="view-btn">
                                <a href="project-details.html">view details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End project-area section -->

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

    <!-- Start footer section -->
@endsection
