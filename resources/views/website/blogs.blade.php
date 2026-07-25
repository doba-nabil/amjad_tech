@extends('website.layouts.app')

@section('title', __('dashboard.blogs') ?? 'Our Blogs')
@section('meta_description', __('dashboard.blogs_meta_desc') ?? 'Read our latest blogs and articles.')

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

        @php
            $currentBanner = $settings->blogs_banner ?? null;
            if (isset($category) && $category->banner) {
                $currentBanner = $category->banner;
            } elseif (isset($tagModel) && $tagModel->banner) {
                $currentBanner = $tagModel->banner;
            }
        @endphp
        @include('website.partials.breadcrumb', [
            'title' => isset($category) ? $category->name : (isset($tagModel) ? __('dashboard.tag') . ': ' . $tagModel->name : (__('dashboard.blogs') ?? 'Blogs')),
            'banner' => $currentBanner,
        ])

        <!-- Start blog-grid section -->
        <section class="blog-grid sec-mar-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sidebar-widget">
                            <div class="widget-search">
                                <form action="{{ route('blogs') }}" method="GET">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('dashboard.search_here') ?? 'Search Here' }}">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4>{{ __('dashboard.category') ?? 'Category' }}</h4>
                            <ul class="category">
                                @foreach($blogCategories as $cat)
                                    <li><a href="{{ route('category.blogs', $cat->slug) }}">{{ $cat->name }}<i class="bi bi-arrow-right"></i></a></li>
                                @endforeach
                            </ul>
                        </div>

                        @php
                            $all_tags = \App\Models\Tag::all();
                        @endphp
                        @if($all_tags->count() > 0)
                        <div class="sidebar-widget">
                            <h4>{{ __('dashboard.tags') ?? 'Tag' }}</h4>
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
                                <div class="col-md-6 d-flex">
                                    <div class="single-blog w-100 d-flex flex-column">
                                        <div class="blog-thumb">
                                            <a href="{{ route('blog.details', $blog->slug) }}"><img src="{{ isset($blog->image) ? Storage::url($blog->image) : asset('assets/img/blog/blog-1.jpg') }}" alt="{{ $blog->main_title }}"></a>
                                            <div class="tag">
                                                <a href="{{ isset($blog->category) ? route('category.blogs', $blog->category->slug) : '#' }}">{{ $blog->category->name ?? 'Blog' }}</a>
                                            </div>
                                        </div>
                                        <div class="blog-inner flex-grow-1">
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
