@extends('website.layouts.app')

@section('title', __('dashboard.blogs') ?? 'Blogs')
@section('meta_description', __('dashboard.blogs_desc') ?? 'Read our latest insights and articles.')

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

        @include('website.partials.breadcrumb', ['title' => __('dashboard.blogs') ?? 'Blogs'])

        <!-- Start blog-grid section -->
        <section class="blog-grid sec-mar-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sidebar-widget">
                            <div class="widget-search">
                                <form action="{{ route('blogs') }}" method="get">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Here">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4>Category</h4>
                            <ul class="category">
                                @foreach($blogCategories as $cat)
                                    <li><a href="{{ route('category.blogs', $cat->slug) }}">{{ $cat->name }}<i class="bi bi-arrow-right"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar-widget">
                            <h4>Newest Post</h4>
                            @foreach($recentBlogs as $recentBlog)
                            <div class="recent-post">
                                <div class="recent-thumb">
                                    <a href="{{ route('blog.details', $recentBlog->slug) }}"><img src="{{ isset($recentBlog->image) ? Storage::url($recentBlog->image) : asset('assets/img/blog/blog-tiny-1.jpg') }}" alt="{{ $recentBlog->main_title }}"></a>
                                </div>
                                <div class="recent-post-cnt">
                                    <span>{{ $recentBlog->published_at ? $recentBlog->published_at->format('d.m.Y') : $recentBlog->created_at->format('d.m.Y') }}</span>
                                    <h5><a href="{{ route('blog.details', $recentBlog->slug) }}">{{ $recentBlog->main_title }}</a></h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @php
                            $all_tags = \App\Models\Tag::all();
                        @endphp
                        @if($all_tags->count() > 0)
                        <div class="sidebar-widget">
                            <h4>Tag</h4>
                            <ul class="tag-list">
                                @foreach($all_tags as $tag)
                                <li><a href="{{ route('blogs', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-8">
                        <div class="blog-item-grid">
                            <div class="row g-4">
                                @foreach($blogs as $blog)
                                <div class="col-md-6">
                                    <div class="single-blog">
                                        <div class="blog-thumb">
                                            <a href="{{ route('blog.details', $blog->slug) }}"><img src="{{ isset($blog->image) ? Storage::url($blog->image) : asset('assets/img/blog/blog-1.jpg') }}" alt="{{ $blog->main_title }}"></a>
                                            <div class="tag">
                                                <a href="{{ isset($blog->category) ? route('category.blogs', $blog->category->slug) : '#' }}">{{ $blog->category->name ?? 'Blog' }}</a>
                                            </div>
                                        </div>
                                        <div class="blog-inner">
                                            <div class="author-date">
                                                <a href="#">By, {{ $blog->author_name ?? 'Admin' }}</a>
                                                <a href="#">{{ $blog->published_at ? $blog->published_at->format('d.m.Y') : $blog->created_at->format('d.m.Y') }}</a>
                                            </div>
                                            <h4><a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->main_title }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{ $blogs->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End blog-grid section -->
@endsection
