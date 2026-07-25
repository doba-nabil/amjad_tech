@extends('emails.layout')

@section('title', __('dashboard.contact_received_subject') ?? 'Thank you for contacting us')

@section('content')
    <h1>{{ __('dashboard.hello') ?? 'Hello' }} {{ $contactRequest->name }},</h1>
    
    <p>{{ __('dashboard.contact_received_msg') ?? 'Thank you for getting in touch with us! We have successfully received your inquiry and our team will get back to you as soon as possible.' }}</p>
    
    <p><strong>{{ __('dashboard.your_message') ?? 'Your Message:' }}</strong></p>
    <blockquote style="background: #f9f9f9; padding: 15px; border-left: 4px solid #0b5ed7; margin: 0 0 20px 0;">
        {{ $contactRequest->message }}
    </blockquote>
    
    <p>{{ __('dashboard.best_regards') ?? 'Best Regards,' }}<br>{{ config('app.name') }}</p>
@endsection
