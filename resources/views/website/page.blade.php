@extends('website.layouts.app')

@section('title', $page->title)
@section('meta_description', Str::limit(strip_tags($page->content), 150))
@if($page->banner)
    @section('meta_image', Storage::url($page->banner))
@endif

@section('content')
@include('website.partials.breadcrumb', ['title' => $page->title, 'banner' => $page->banner ?? $settings->other_pages_banner ?? null])
<div class="container py-5">{!! $page->content !!}</div>
@endsection
