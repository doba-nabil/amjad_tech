<?php
$html = file_get_contents('public/html/index2.html');

$head = substr($html, 0, strpos($html, '<header'));
$header = substr($html, strpos($html, '<header'), strpos($html, '</header>') + 9 - strpos($html, '<header'));
$content_start = strpos($html, '<main class="creasoft-wrap">');
$footer_start = strpos($html, '<footer');
$content = substr($html, $content_start, $footer_start - $content_start);
$footer = substr($html, $footer_start, strpos($html, '</footer>') + 9 - $footer_start);
$tail = substr($html, strpos($html, '</footer>') + 9);

$app = $head . "\n@include('website.layouts.header')\n\n<main class=\"creasoft-wrap\">\n@yield('content')\n</main>\n\n@include('website.layouts.footer')\n\n" . $tail;

$app = str_replace('assets/', '{{ asset(\'assets/\') }}/', $app);
$header = str_replace('assets/', '{{ asset(\'assets/\') }}/', $header);
$footer = str_replace('assets/', '{{ asset(\'assets/\') }}/', $footer);
$content = str_replace('assets/', '{{ asset(\'assets/\') }}/', $content);

$seoTags = <<<HTML
    <!-- Title & SEO Meta -->
    <title>@yield('title', \$settings->meta_title ?? \$settings->site_name ?? 'Creasoft')</title>
    <meta name="description" content="@yield('meta_description', \$settings->meta_description ?? '')">
    <meta name="keywords" content="@yield('meta_keywords', '')">

    <!-- Open Graph (Social Media) -->
    <meta property="og:title" content="@yield('title', \$settings->meta_title ?? \$settings->site_name ?? 'Creasoft')">
    <meta property="og:description" content="@yield('meta_description', \$settings->meta_description ?? '')">
    <meta property="og:image" content="@yield('meta_image', isset(\$settings->logo) ? Storage::url(\$settings->logo) : asset('assets/img/logo.svg'))">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ isset(\$settings->favicon) ? Storage::url(\$settings->favicon) : asset('favicon.ico') }}">
HTML;

$app = preg_replace('/<!-- Title -->.*?<\/title>/is', $seoTags, $app);

file_put_contents('resources/views/website/layouts/app.blade.php', $app);
file_put_contents('resources/views/website/layouts/header.blade.php', $header);
file_put_contents('resources/views/website/layouts/footer.blade.php', $footer);
file_put_contents('resources/views/website/index.blade.php', "@extends('website.layouts.app')\n\n@section('content')\n" . str_replace('<main class="creasoft-wrap">', '', $content) . "\n@endsection");

echo "Done extracting.";
