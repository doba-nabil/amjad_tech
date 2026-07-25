@extends('website.layouts.app')

@section('title', $blog->main_title)
@section('meta_description', Str::limit(strip_tags($blog->content), 150))
@if($blog->image)
    @section('meta_image', Storage::url($blog->image))
@endif

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

        @include('website.partials.breadcrumb', [
            'title' => $blog->main_title,
            'banner' => $blog->banner ?? $settings->blogs_banner ?? null,
        ])

        <!-- Start blog-details-area section -->
        <section class="blog-details-area sec-mar-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-details-content">
                            <h3>{{ $blog->main_title }}</h3>
                            <div class="author-date layout2">
                                <a href="#">By, {{ $blog->author_name ?? 'Admin' }}</a>
                                @if($blog->enable_comments)
                                <a href="#comments">Comment ({{ $blog->comments()->count() }})</a>
                                @endif
                                <a href="#">{{ $blog->published_at ? $blog->published_at->format('d.m.Y') : $blog->created_at->format('d.m.Y') }}</a>
                            </div>
                            <div class="details-thumb">
                                <img src="{{ isset($blog->image) ? Storage::url($blog->image) : asset('assets/img/blog/blog-thumb.jpg') }}" alt="{{ $blog->main_title }}">
                            </div>
                            
                            <div class="blog-content mt-4">
                                {!! $blog->content !!}
                            </div>
                            
                            @if($blog->tags->count() > 0)
                            <div class="tag-share">
                                <div class="line-tag">
                                    <span>Tag:</span>
                                    @foreach($blog->tags as $tag)
                                        <a href="{{ route('blogs', ['tag' => $tag->slug]) }}">{{ $tag->name }},</a>
                                    @endforeach
                                </div>
                                <div class="share-blog">
                                    <span>{{ __('dashboard.share_on') ?? 'Share On:' }}</span>
                                    @php
                                        $shareUrl  = urlencode(url()->current());
                                        $shareTitle = urlencode($blog->main_title);
                                    @endphp
                                    <ul class="social-share-blog">
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank" rel="noopener">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareTitle }}" target="_blank" rel="noopener">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank" rel="noopener">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            @if($blog->enable_comments)
                            <div class="comments" id="comments">
                                <h3>{{ $blog->comments()->count() }} Comment{{ $blog->comments()->count() > 1 ? 's' : '' }}</h3>
                                @foreach($blog->comments as $comment)
                                <div class="single-comment">
                                    <div class="author-post">
                                        <div class="author-info">
                                            <h5>{{ $comment->name }}</h5>
                                            <span>{{ $comment->created_at->format('d F, Y At h.i a') }}</span>
                                        </div>
                                    </div>
                                    <p>{{ $comment->message }}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="comment-form">
                                <h5>Leave A Comment</h5>
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <form action="{{ route('blog.comment', $blog->slug) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name">Name*
                                                <input type="text" name="name" placeholder="Your Name" id="name" required>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Email*
                                                <input type="email" name="email" placeholder="Enter Your Email" id="email" required>
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <label for="msg">Message*
                                                <textarea name="message" cols="30" rows="10" placeholder="Type your Message" id="msg" required></textarea>
                                            </label>
                                            <input type="submit" value="Submit Comment">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="sidebar-widget">
                            <div class="widget-search">
                                <form action="{{ route('blogs') }}" method="GET">
                                    <input type="text" name="search" placeholder="{{ __('dashboard.search_here') ?? 'Search Here' }}" value="{{ request('search') }}">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                        
                        @php
                            $categories = \App\Models\Category::has('blogs')->get();
                            $recent_blogs = \App\Models\Blog::latest()->take(3)->get();
                            $all_tags = \App\Models\Tag::all();
                        @endphp
                        
                        @if($categories->count() > 0)
                        <div class="sidebar-widget">
                            <h4>{{ __('dashboard.category') ?? 'Category' }}</h4>
                            <ul class="category">
                                @foreach($categories as $category)
                                <li><a href="{{ route('category.blogs', $category->slug) }}">{{ $category->name }}<i class="bi bi-arrow-right"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        @if($recent_blogs->count() > 0)
                        <div class="sidebar-widget">
                            <h4>{{ __('dashboard.newest_post') ?? 'Newest Post' }}</h4>
                            @foreach($recent_blogs as $recent)
                            <div class="recent-post">
                                <div class="recent-thumb">
                                    <a href="{{ route('blog.details', $recent->slug) }}">
                                        <img src="{{ isset($recent->image) ? Storage::url($recent->image) : asset('assets/img/blog/blog-tiny-1.jpg') }}" alt="{{ $recent->main_title }}">
                                    </a>
                                </div>
                                <div class="recent-post-cnt">
                                    <span>{{ $recent->published_at ? $recent->published_at->format('d.m.Y') : $recent->created_at->format('d.m.Y') }}</span>
                                    <h5><a href="{{ route('blog.details', $recent->slug) }}">{{ \Illuminate\Support\Str::limit($recent->main_title, 40) }}</a></h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        
                        @if($all_tags->count() > 0)
                        <div class="sidebar-widget">
                            <h4>{{ __('dashboard.tags') ?? 'Post Tag' }}</h4>
                            <ul class="tag-list">
                                @foreach($all_tags as $tag)
                                <li><a href="{{ route('blogs', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div class="sidebar-banner">
                            <img src="{{ asset('assets/img/widget-banner-bg.jpg') }}" alt="">
                            <div class="banner-inner">
                                <h3>{{ $settings->contact_title ?? 'Any Project' }} <span>Call Now.</span>
                                    <img class="angle" src="{{ asset('assets/img/arrow-angle.png') }}" alt="">
                                </h3>
                                @php
                                    $bannerPhone = (!empty($settings->phone_numbers) && isset($settings->phone_numbers[0]['phone'])) ? $settings->phone_numbers[0]['phone'] : ($settings->phone ?? '+1-123-123-1234');
                                @endphp
                                <a href="tel:{{ $bannerPhone }}">{{ $bannerPhone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End blog-details-area section -->
@endsection
