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

        @include('website.partials.breadcrumb', ['title' => __('Blogs')])

        <!-- Start blog-grid section -->
        <section class="blog-grid sec-mar-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sidebar-widget">
                            <div class="widget-search">
                                <form action="#" method="post">
                                    <input type="text" name="search" placeholder="Search Here">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4>Category</h4>
                            <ul class="category">
                                <li><a href="project.html">Web Design<i class="bi bi-arrow-right"></i></a></li>
                                <li><a href="project.html">Apps Development<i class="bi bi-arrow-right"></i></a></li>
                                <li><a href="project.html">Software Development<i class="bi bi-arrow-right"></i></a></li>
                                <li><a href="project.html">Motion Graphics<i class="bi bi-arrow-right"></i></a></li>
                                <li><a href="project.html">UI/UX Design<i class="bi bi-arrow-right"></i></a></li>
                                <li><a href="project.html">Graphic Design<i class="bi bi-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget">
                            <h4>Newest Post</h4>
                            <div class="recent-post">
                                <div class="recent-thumb">
                                    <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-tiny-1.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-cnt">
                                    <span>11.12.22</span>
                                    <h5><a href="blog-details.html">Grant Distributions Conti nu to Incr Ease.</a></h5>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="recent-thumb">
                                    <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-tiny-2.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-cnt">
                                    <span>30.10.2022</span>
                                    <h5><a href="blog-details.html">Distributions Conti nu to grant Incr Ease.</a></h5>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="recent-thumb">
                                    <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-tiny-3.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-cnt">
                                    <span>20.08.2022</span>
                                    <h5><a href="blog-details.html">Conti nu to Incr Ease malesuada sapien sed.</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4>Post Tag</h4>
                            <ul class="tag-list">
                                <li><a href="project.html">Website</a></li>
                                <li><a href="project.html">Web Design</a></li>
                                <li><a href="project.html">Development</a></li>
                                <li><a href="project.html">Graphic Design</a></li>
                                <li><a href="project.html">Graphic</a></li>
                                <li><a href="project.html">UI/UX Design</a></li>
                                <li><a href="project.html">Activities</a></li>
                                <li><a href="project.html">Software Design</a></li>
                                <li><a href="project.html">3d Design</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-banner">
                            <img src="{{ asset('assets/') }}/img/widget-banner-bg.jpg" alt="">
                            <div class="banner-inner">
                                <h3>Any Project <span>Call Now.</span>
                                    <img class="angle" src="{{ asset('assets/') }}/img/arrow-angle.png" alt="">
                                </h3>
                                <a href="tel:11231231234">+1-123-123-1234</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="blog-item-grid">
                            <div class="row g-4">
                                <div class="col-md-6">
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
                                                <a href="#">23.02.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">Quisque malesuada sapien and Donec sed nunc.</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                                <a href="#">12.02.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">Suspendisse pretium magna qu nisl egestas porttitor.</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                                <a href="#">25.02.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">In a augue sit amet erat Suspel eleifend suscipit issen.</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-blog">
                                        <div class="blog-thumb">
                                            <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-4.jpg" alt=""></a>
                                            <div class="tag">
                                                <a href="project.html">3D Design</a>
                                            </div>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="author-date">
                                                <a href="#">By, Admin</a>
                                                <a href="#">30.03.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">Quisque malesuada sapien and Donec sed nunc.</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-blog">
                                        <div class="blog-thumb">
                                            <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-5.jpg" alt=""></a>
                                            <div class="tag">
                                                <a href="project.html">Graphic</a>
                                            </div>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="author-date">
                                                <a href="#">By, Admin</a>
                                                <a href="#">21.05.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">Suspendisse pretium magna qu nisl egestas porttitor.</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-blog">
                                        <div class="blog-thumb">
                                            <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-6.png" alt=""></a>
                                            <div class="tag">
                                                <a href="project.html">App</a>
                                            </div>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="author-date">
                                                <a href="#">By, Admin</a>
                                                <a href="#">26.04.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">In a augue sit amet erat Suspel eleifend suscipit issen.</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-blog">
                                        <div class="blog-thumb">
                                            <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-7.jpg" alt=""></a>
                                            <div class="tag">
                                                <a href="project.html">Development</a>
                                            </div>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="author-date">
                                                <a href="#">By, Admin</a>
                                                <a href="#">15.04.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">Quisque malesuada sapien and Donec sed nunc.</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-blog">
                                        <div class="blog-thumb">
                                            <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-8.jpg" alt=""></a>
                                            <div class="tag">
                                                <a href="project.html">Software</a>
                                            </div>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="author-date">
                                                <a href="#">By, Admin</a>
                                                <a href="#">12.06.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">Suspendisse pretium magna qu nisl egestas porttitor.</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-blog">
                                        <div class="blog-thumb">
                                            <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-9.jpg" alt=""></a>
                                            <div class="tag">
                                                <a href="project.html">UI/UX</a>
                                            </div>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="author-date">
                                                <a href="#">By, Admin</a>
                                                <a href="#">20.12.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">In a augue sit amet erat Suspel eleifend suscipit issen.</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-blog">
                                        <div class="blog-thumb">
                                            <a href="blog-details.html"><img src="{{ asset('assets/') }}/img/blog/blog-10.jpg" alt=""></a>
                                            <div class="tag">
                                                <a href="project.html">3D Design</a>
                                            </div>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="author-date">
                                                <a href="#">By, Admin</a>
                                                <a href="#">22.05.2022</a>
                                            </div>
                                            <h4><a href="blog-details.html">In a augue sit amet erat Suspel eleifend suscipit issen.</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="load-more">
                            <ul class="paginations">
                                <li><a href="#"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                                <li><a href="#">01</a></li>
                                <li class="active"><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                                <li><a href="#">04</a></li>
                                <li><a href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End blog-grid section -->

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
