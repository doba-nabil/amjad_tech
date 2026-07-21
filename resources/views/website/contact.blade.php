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

        @include('website.partials.breadcrumb', ['title' => __('Contact')])

        <!-- Start contact-area section -->
        <section class="contact-area sec-mar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <div class="contact-left">
                            <div class="sec-title layout2">
                                <span>Get in touch</span>
                                <h2>Contact us if you have more questions.</h2>
                            </div>
                            <ul class="social-follow">
                                <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <div class="informations">
                                <div class="single-info">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="info">
                                        <h3>Location</h3>
                                        <p>65a Mill St E, Acton, Ontario, L7J 1H3, Canada</p>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="info">
                                        <h3>Phone</h3>
                                        <a href="tel:0096541041383">+965 41041383</a>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="info">
                                        <h3>Email</h3>
                                        <a href="tell:info@hipsera.com">info@hipsera.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe src="https://maps.google.com/maps?q=dhaka%20bangladesh&amp;t=&amp;z=9&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="getin-touch">
                    <div class="row">
                        <div class="col-md-6 col-lg-7">
                            <div class="contact-form wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <h3>Have Any Questions</h3>
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" name="name" placeholder="Enter your name">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" placeholder="Enter your email">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="subject" placeholder="Subject">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="message" cols="30" rows="10" placeholder="Your message"></textarea>
                                            <input type="submit" value="Send Message">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 wow animate fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="call-banner">
                                <img src="{{ asset('assets/') }}/img/call-center.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End contact-area section -->

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
