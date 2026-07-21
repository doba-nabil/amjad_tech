<?php

$file = 'resources/views/website/index.blade.php';
$html = file_get_contents($file);

// 1. Remove testimonial-area
$html = preg_replace('/<section class="testimonial-area">.*?<\/section>/is', '', $html);

// 2. Remove our-team area
$html = preg_replace('/<section class="our-team sec-mar">.*?<\/section>/is', '', $html);

// 3. Bind Services
$servicesTitle = '{{ $settings->home_services_title ?? "Our Solutions" }}';
$servicesSubtitle = '{{ $settings->home_services_subtitle ?? "Services" }}';
$servicesText = '{{ $settings->home_services_text ?? "Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor." }}';

$servicesSectionHeaderRegex = '/<div class="sec-title">.*?<span>.*?<\/span>.*?<h2>.*?<\/h2>.*?<p>.*?<\/p>.*?<\/div>/is';
$servicesSectionHeaderNew = <<<HTML
<div class="sec-title">
                        <span>$servicesTitle</span>
                        <h2>$servicesSubtitle</h2>
                        <p>$servicesText</p>
                    </div>
HTML;
// Replace only the first occurrence which is in services area
// Wait, the title block structure is the same for all. Let's be more specific.

$html = preg_replace(
    '/(<section class="services-area.*?)<div class="sec-title">.*?<\/div>/is',
    "$1" . $servicesSectionHeaderNew,
    $html
);

// Services Loop
$servicesLoop = <<<HTML
@foreach(\$services as \$service)
                        <div class="swiper-slide wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="single-service">
                                <span>{{ str_pad(\$loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <div class="icon">
                                    <img src="{{ isset(\$service->image) ? Storage::url(\$service->image) : asset('assets/img/icons/service-icon-1.png') }}" alt="">
                                </div>
                                <h4>{{ \$service->title }}</h4>
                                <p>{{ Str::limit(strip_tags(\$service->content), 80) }}</p>
                                <div class="read-btn">
                                    <a href="{{ route('contact') }}"><i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
@endforeach
HTML;

$html = preg_replace('/(<section class="services-area.*?)<div class="swiper-wrapper">.*?<\/div>\s*<div class="swiper-pagination/is', "$1<div class=\"swiper-wrapper\">\n" . $servicesLoop . "\n</div>\n<div class=\"swiper-pagination", $html);


// 4. Bind Projects
$projectsTitle = '{{ $settings->home_projects_title ?? "Project" }}';
$projectsSubtitle = '{{ $settings->home_projects_subtitle ?? "Look at my work" }}';
$projectsText = '{{ $settings->home_projects_text ?? "Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor." }}';

$projectsSectionHeaderNew = <<<HTML
<div class="sec-title">
                        <span>$projectsTitle</span>
                        <h2>$projectsSubtitle</h2>
                        <p>$projectsText</p>
                    </div>
HTML;

$html = preg_replace(
    '/(<section class="project-area.*?)<div class="sec-title">.*?<\/div>/is',
    "$1" . $projectsSectionHeaderNew,
    $html
);

$projectsLoop = <<<HTML
@foreach(\$projects as \$project)
                        <div class="swiper-slide">
                            <div class="single-project">
                                <div class="project-img">
                                    <a href="{{ route('project.details', \$project->slug) }}"><img src="{{ Storage::url(\$project->image) }}" alt=""></a>
                                </div>
                                <div class="project-inner">
                                    <span>{{ \$project->title }}</span>
                                    <h3><a href="{{ route('project.details', \$project->slug) }}">{{ \$project->title }}</a></h3>
                                </div>
                            </div>
                        </div>
@endforeach
HTML;
$html = preg_replace('/(<section class="project-area.*?)<div class="swiper-wrapper">.*?<\/div>\s*<div class="swiper-pagination/is', "$1<div class=\"swiper-wrapper\">\n" . $projectsLoop . "\n</div>\n<div class=\"swiper-pagination", $html);

// 5. Bind Blogs
$blogsTitle = '{{ $settings->home_blog_title ?? "All Blog" }}';
$blogsSubtitle = '{{ $settings->home_blog_subtitle ?? "Latest Post" }}';
$blogsText = '{{ $settings->home_blog_text ?? "Curabitur sed facilisis erat. Vestibulum pharetra eros eget fringilla porttitor." }}';

$blogsSectionHeaderNew = <<<HTML
<div class="sec-title">
                        <span>$blogsTitle</span>
                        <h2>$blogsSubtitle</h2>
                        <p>$blogsText</p>
                    </div>
HTML;

$html = preg_replace(
    '/(<section class="blog-area.*?)<div class="sec-title">.*?<\/div>/is',
    "$1" . $blogsSectionHeaderNew,
    $html
);

$blogsLoop = <<<HTML
@foreach(\$blogs as \$blog)
                    <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="single-blog">
                            <div class="blog-thumb">
                                <a href="{{ route('blog.details', \$blog->slug) }}"><img src="{{ Storage::url(\$blog->image) }}" alt=""></a>
                            </div>
                            <div class="blog-inner">
                                <div class="author-date">
                                    <a href="#">By, Admin</a>
                                    <a href="#">{{ \$blog->created_at->format('d.m.Y') }}</a>
                                </div>
                                <h4><a href="{{ route('blog.details', \$blog->slug) }}">{{ \$blog->title }}</a></h4>
                            </div>
                        </div>
                    </div>
@endforeach
HTML;

$html = preg_replace('/(<section class="blog-area.*?)<div class="row">.*?<\/div>\s*<\/div>\s*<\/section>/is', "$1<div class=\"row\">\n" . $blogsLoop . "\n</div>\n</div>\n</section>", $html);


file_put_contents($file, $html);
echo "Index updated.";
