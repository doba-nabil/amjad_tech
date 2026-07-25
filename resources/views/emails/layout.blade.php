<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;
            margin: 0;
            padding: 0;
            direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};
            text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #1a1a1a;
            padding: 20px;
            text-align: center;
        }
        .header img {
            max-height: 60px;
        }
        .content {
            padding: 30px;
            line-height: 1.6;
        }
        .content h1 {
            color: #0b5ed7;
            font-size: 22px;
            margin-top: 0;
        }
        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #777777;
            border-top: 1px solid #eeeeee;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #0b5ed7;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #0a53be;
        }
    </style>
</head>
<body>
    <div class="email-container">
        @php
            $settings = \App\Models\Setting::first();
            $logo = $settings && $settings->logo ? Storage::url($settings->logo) : asset('assets/img/logo.png');
        @endphp
        
        <div class="header">
            <img src="{{ url($logo) }}" alt="Logo">
        </div>
        
        <div class="content">
            @yield('content')
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('dashboard.all_rights_reserved') ?? 'All rights reserved.' }}</p>
        </div>
    </div>
</body>
</html>
