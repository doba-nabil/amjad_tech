@extends('emails.layout')

@section('title', $subjectLine)

@section('content')
    <h1>{{ $subjectLine }}</h1>
    
    <div>
        {!! $content !!}
    </div>
@endsection
