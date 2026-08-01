@extends('website.layouts.app')

@section('title', __('dashboard.home_meta_title') ?? 'Home - Tech Company')
@section('meta_description', __('dashboard.home_meta_desc') ?? 'Welcome to our Tech Company, providing the best services for you.')

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
        <section class="hero-area" style="position: relative; height: 100vh; overflow: hidden; display: flex; align-items: center; background: #000 !important;">
            @if($settings->home_video_file || $settings->home_video_url)
                <video autoplay loop muted playsinline style="position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: 1; transform: translate(-50%, -50%); object-fit: cover;">
                    <source src="{{ $settings->home_video_file ? Storage::url($settings->home_video_file) : $settings->home_video_url }}" type="video/mp4">
                </video>
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.6); z-index: 2;"></div>
            @else
                <div class="ken-burns-slideshow" style="z-index: 1;">
                    <img loading="lazy" src="{{ asset('assets/') }}/img/hero-banner.jpg" alt="image">
                </div>
            @endif
            @if($settings->show_hero_social ?? true)
            <div class="verticale-social" style="position: relative; z-index: 3;">
                <ul class="vertical-media">
                    @if(isset($settings->social_media) && is_array($settings->social_media) && count($settings->social_media) > 0)
                        @foreach($settings->social_media as $platform => $url)
                            <li><a href="{{ $url }}">{{ ucfirst($platform) }}</a></li>
                        @endforeach
                    @else
                        <li><a href="https://www.facebook.com/">Facebook</a></li>
                        <li><a href="https://www.instagram.com/">Instagram</a></li>
                        <li><a href="https://www.linkedin.com/">Linkedin</a></li>
                    @endif
                </ul>
            </div>
            @endif
            <div class="hero-wrapper" style="display: none;">
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
                                <span class="service-num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <div class="icon">
                                    <img loading="lazy" src="{{ isset($service->image) ? Storage::url($service->image) : asset('assets/img/icons/service-icon-1.png') }}" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                </div>
                                <h4>{{ $service->title }}</h4>
                                <p>{{ Str::limit(strip_tags($service->description), 150) }}</p>
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
        @if($settings->show_about_section)
        <section class="about-area sec-mar-bottom" style="margin-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 or-2 wow animate fadeIn" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="sec-title layout2">
                            <span>{{ $settings->home_about_title ?? "Get To Know" }}</span>
                            <h2>{{ $settings->home_about_subtitle ?? "About Us" }}</h2>
                        </div>
                        <div class="about-left">
                            <h3>{{ $settings->home_about_text ?? "We do design, code & develop Software finally launch." }}</h3>
                            <div class="company-since">
                                <div class="company-logo">
                                    <img loading="lazy" src="{{ asset('assets/') }}/img/logo-dark.svg" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                </div>
                                <strong>#1</strong>
                                <h4>Best Creative IT Agency And Solutions <span>Since 2005.</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 or-1 wow animate fadeIn" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="about-right">
                            <div class="banner-1">
                                <img loading="lazy" src="{{ isset($settings->home_about_image) ? Storage::url($settings->home_about_image) : asset('assets/img/about-baner-1.jpg') }}" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
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
                    @foreach($features as $feature)
                    <div class="col-md-6 col-lg-3 wow animate fadeInUp" data-wow-delay="{{ 200 * $loop->iteration }}ms" data-wow-duration="1500ms">
                        <div class="single-feature">
                            <div class="feature-inner">
                                <div class="icon">
                                    <img loading="lazy" src="{{ isset($feature->image) ? Storage::url($feature->image) : asset('assets/img/icons/feature-icon-' . $loop->iteration . '.png') }}" alt="{{ $settings->site_name ?? 'Kartaa' }}">
                                </div>
                                <span class="counter">{{ $feature->counter }}</span><sup>+</sup>
                                <h4>{{ $feature->title }}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                            <li class="active" data-filter="*">{{ __('dashboard.all') ?? 'All' }}</li>
                            @foreach($projectCategories as $category)
                                <li data-filter=".cat-{{ $category->id }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row g-4 project-items">
                    @foreach($projects as $project)
                    <div class="col-md-6 col-lg-4 single-item cat-{{ $project->category_id }}">
                        <div class="item-img">
                            <a href="{{ route('project.details', $project->slug) }}"><img loading="lazy" src="{{ isset($project->main_image) ? Storage::url($project->main_image) : asset('assets/img/project/project-1.jpg') }}" alt="{{ $settings->site_name ?? 'Kartaa' }}"></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span style="color: #000;">{{ $project->category->name ?? 'Project' }}</span>
                            <h4 style="color: #000;">{{ $project->name }}</h4>
                            <div class="view-btn">
                                <a aria-label="View details for {{ $project->name ?? 'project' }}" href="{{ route('project.details', $project->slug) }}" style="color: #000;">{{ __('dashboard.view_details') ?? 'View Details' }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                            <span>{{ $settings->home_partners_subtitle ?? 'Satisfied Client' }}</span>
                            <h2>{{ $settings->home_partners_title ?? 'Our Partner' }}</h2>
                            <div class="-partnerslider-navigator">
                                <div class="swiper-button-prev-c"><i class="bi bi-chevron-left"></i></div>
                                <div class="swiper-button-next-c"><i class="bi bi-chevron-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="swiper partner-slider">
                            <div class="swiper-wrapper">
                                @foreach($partners as $partner)
                                <div class="swiper-slide">
                                    <div class="single-partner">
                                        <img loading="lazy" src="{{ Storage::url($partner->image) }}" alt="{{ $partner->name ?? 'Partner' }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End our-partner section -->

        <!-- Start priceing-plan section -->
        @if($settings->show_packages_section && ($monthlyPackages->isNotEmpty() || $yearlyPackages->isNotEmpty()))
        <section class="priceing-plan sec-mar">
            <div class="container">
                <div class="title-wrap">
                    <div class="sec-title">
                        <span>{{ $settings->home_packages_title ?? "Getting Start" }}</span>
                        <h2>{{ $settings->home_packages_subtitle ?? "Pricing Plan" }}</h2>
                        <p>{{ $settings->home_packages_text ?? "Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor." }}</p>
                    </div>
                </div>

                @if($pricingCountries->count() > 1)
                <div class="row justify-content-center mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <select id="country-select" class="form-select form-select-lg">
                            @foreach($pricingCountries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="price-table-tab">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                @if($monthlyPackages->isNotEmpty())
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-monthly" type="button" role="tab" aria-controls="pills-monthly" aria-selected="true">{{ __('dashboard.pay_monthly') ?? 'Pay Monthly' }}</button>
                                </li>
                                @endif
                                @if($yearlyPackages->isNotEmpty())
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $monthlyPackages->isEmpty() ? 'active' : '' }}" id="pills-yearly-tab" data-bs-toggle="pill" data-bs-target="#pills-yearly" type="button" role="tab" aria-controls="pills-yearly" aria-selected="{{ $monthlyPackages->isEmpty() ? 'true' : 'false' }}">{{ __('dashboard.pay_yearly') ?? 'Pay Yearly' }}</button>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    @include('website.partials.packages', ['monthlyPackages' => $monthlyPackages, 'yearlyPackages' => $yearlyPackages])
                </div>
            </div>
        </section>
        @endif

        <!-- End priceing-plan section -->

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
                    @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-4 d-flex wow animate fadeInUp" data-wow-delay="{{ 200 * $loop->iteration }}ms" data-wow-duration="1500ms">
                        <div class="single-blog w-100 d-flex flex-column">
                            <div class="blog-thumb">
                                <a href="{{ route('blog.details', $blog->slug) }}"><img loading="lazy" src="{{ isset($blog->image) ? Storage::url($blog->image) : asset('assets/img/blog/blog-1.jpg') }}" alt="{{ $settings->site_name ?? 'Kartaa' }}"></a>
                                <div class="tag">
                                    <a href="{{ isset($blog->category) ? route('category.blogs', $blog->category->slug) : '#' }}">{{ $blog->category->name ?? 'Blog' }}</a>
                                </div>
                            </div>
                            <div class="blog-inner flex-grow-1">
                                <div class="author-date">
                                    <a href="{{ route('blog.details', $blog->slug) }}">By, {{ $blog->author_name ?? '' }}</a>
                                    <a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->published_at ? $blog->published_at->format('d.m.Y') : $blog->created_at->format('d.m.Y') }}</a>
                                </div>
                                <h4><a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->main_title }}</a></h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endif
        <!-- End blog-area section -->


        <!-- Start footer section -->
        
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countrySelect = document.getElementById('country-select');
        const tabContent = document.getElementById('pills-tabContent');
        
        if (countrySelect && tabContent) {
            function fetchPackages(countryId) {
                tabContent.style.opacity = '0.5';
                
                fetch(`{{ route('packages.render') }}?country_id=${countryId}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'text/html'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    tabContent.innerHTML = html;
                    tabContent.style.opacity = '1';
                })
                .catch(error => {
                    console.error('Error fetching packages:', error);
                    tabContent.style.opacity = '1';
                });
            }

            countrySelect.addEventListener('change', function() {
                fetchPackages(this.value);
            });

            if (countrySelect.value) {
                fetchPackages(countrySelect.value);
            }
        }
    });
</script>
@endsection
