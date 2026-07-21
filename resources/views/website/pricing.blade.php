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

         @include('website.partials.breadcrumb', ['title' => __('Pricing')])

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
