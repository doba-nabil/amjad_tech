@extends('website.layouts.app')

@section('content')
@include('website.partials.breadcrumb', ['title' => $page->title, 'banner' => $page->banner])
<div class="container py-5">{!! $page->content !!}</div>
@endsection
