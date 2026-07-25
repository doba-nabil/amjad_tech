@extends('website.layouts.app')

@section('title', $project->name)
@section('meta_description', Str::limit(strip_tags($project->description), 150))

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
            'title' => $project->name,
            'banner' => $settings->projects_banner ?? null,
        ])

        <!-- Start project-details section -->
        <section class="project-details sec-mar-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="project-details-content">
                            <div class="project-thumb">
                                <img src="{{ isset($project->main_image) ? Storage::url($project->main_image) : asset('assets/img/project/thumbnail-project.jpg') }}" alt="{{ $project->name }}">
                                <div class="tag">
                                    <a href="{{ route('projects') }}">{{ $project->category->name ?? 'Project' }}</a>
                                </div>
                            </div>
                            <h3>{{ $project->name }}</h3>
                            <p>{!! $project->description !!}</p>
                            
                            @if($project->client_needs)
                            <div class="clinet-need">
                                <h4>Client Needs</h4>
                                {!! $project->client_needs !!}
                            </div>
                            @endif

                            @if($project->working_process)
                            <div class="working-process">
                                <h4>Working Process</h4>
                                {!! $project->working_process !!}
                            </div>
                            @endif

                            @if($project->check_and_launch)
                            <div class="check-lunch">
                                <h4>Check & Launch</h4>
                                {!! $project->check_and_launch !!}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widget">
                            <div class="client-box">
                                <span>Client:</span>
                                <h5>{{ $project->client_name ?? 'N/A' }}</h5>
                            </div>
                            <div class="client-box">
                                <span>Company:</span>
                                <h5>{{ $project->company_name ?? 'N/A' }}</h5>
                            </div>
                            <div class="client-box">
                                <span>Location:</span>
                                <h5>{{ $project->location ?? 'N/A' }}</h5>
                            </div>
                            <div class="client-box">
                                <span>Project Type:</span>
                                <h5>{{ $project->category->name ?? 'N/A' }}</h5>
                            </div>
                            <div class="client-box">
                                <span>Duration:</span>
                                <h5>{{ $project->duration ?? 'N/A' }}</h5>
                            </div>
                            <div class="client-box">
                                <span>Date:</span>
                                <h5>{{ $project->project_date ? $project->project_date->format('d.m.Y') : $project->created_at->format('d.m.Y') }}</h5>
                            </div>
                        </div>
                        
                        <div class="sidebar-widget">
                            <div class="contact-info">
                                <h3>{{ $settings->contact_title ?? 'Need help?' }}</h3>
                                <p>{{ $settings->contact_text ?? 'Interdum et malesuada fames ac ante tolds alli ipsum primis in faucibus. Etiam eu nibh.' }}</p>
                                <div class="cmpy-info">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="cnt">
                                        <h5>Location</h5>
                                        <p>{{ $settings->address ?? '168/170, Avenue 01, Old York Drive Rich Mirpur DOHS, Bangladesh' }}</p>
                                    </div>
                                </div>
                                <div class="cmpy-info">
                                    <div class="icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="cnt">
                                        <h5>Phone</h5>
                                        @if(!empty($settings->phone_numbers) && isset($settings->phone_numbers[0]['phone']))
                                            <a href="tel:{{ $settings->phone_numbers[0]['phone'] }}">{{ $settings->phone_numbers[0]['phone'] }}</a>
                                        @else
                                            <a href="tel:05661111985">+880 566 1111 985</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="cmpy-info">
                                    <div class="icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="cnt">
                                        <h5>Email</h5>
                                        @if(!empty($settings->emails) && isset($settings->emails[0]['email']))
                                            <a href="mailto:{{ $settings->emails[0]['email'] }}">{{ $settings->emails[0]['email'] }}</a>
                                        @else
                                            <a href="mailto:info@example.com">info@example.com</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End project-details section -->
@endsection
