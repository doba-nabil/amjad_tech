@extends('website.layouts.app')

@section('title', __('dashboard.projects') ?? 'Projects')
@section('meta_description', __('dashboard.projects_desc') ?? 'Our latest projects and case studies.')

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
            'title' => __('dashboard.projects') ?? 'Projects',
            'banner' => $settings->projects_banner ?? null,
        ])

        <!-- Start project-area section -->
        <section class="project-area sec-mar">
            <div class="container">

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
                            <a href="{{ route('project.details', $project->slug) }}"><img loading="lazy" src="{{ isset($project->main_image) ? Storage::url($project->main_image) : asset('assets/img/project/project-1.jpg') }}" alt="{{ $project->name }}"></a>
                        </div>
                        <div class="item-inner-cnt">
                            <span style="color: #000;">{{ $project->category->name ?? 'Project' }}</span>
                            <h4 style="color: #000;">{{ $project->name }}</h4>
                            <div class="view-btn">
                                <a href="{{ route('project.details', $project->slug) }}" style="color: #000;">{{ __('dashboard.view_details') ?? 'View Details' }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End project-area section -->


    </main>
    <!-- End creasoft-wrap section -->

    <!-- Start footer section -->
@endsection
