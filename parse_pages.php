<?php

$pages = [
    'about' => 'about.html',
    'projects' => 'project.html',
    'project_details' => 'project-details.html',
    'blogs' => 'blog.html',
    'blog_details' => 'blog-details.html',
    'pricing' => 'pricing.html',
    'contact' => 'contact.html',
    'faq' => 'faq.html',
];

foreach ($pages as $view => $file) {
    $html = file_get_contents('public/html/' . $file);
    
    // Extract content between <main class="creasoft-wrap"> and <footer>
    $content_start = strpos($html, '<main class="creasoft-wrap">');
    if ($content_start === false) continue;
    
    $footer_start = strpos($html, '<footer');
    if ($footer_start === false) continue;
    
    $content = substr($html, $content_start, $footer_start - $content_start);
    $content = str_replace('<main class="creasoft-wrap">', '', $content);
    $content = str_replace('assets/', '{{ asset(\'assets/\') }}/', $content);
    
    // Replace the breadcrumb section completely with our partial
    $content = preg_replace('/<!-- Start breadcrumbs section -->.*?<!-- End breadcrumbs section -->/is', 
        "@include('website.partials.breadcrumb', ['title' => __('" . ucfirst(str_replace('_', ' ', $view)) . "')])", 
        $content);

    $blade = "@extends('website.layouts.app')\n\n@section('content')\n" . trim($content) . "\n@endsection\n";
    file_put_contents('resources/views/website/' . $view . '.blade.php', $blade);
}

// Since website.page is fully dynamic, we also need page.blade.php
$pageBlade = "@extends('website.layouts.app')\n\n@section('content')\n@include('website.partials.breadcrumb', ['title' => \$page->title, 'banner' => \$page->banner])\n<div class=\"container py-5\">{!! \$page->content !!}</div>\n@endsection\n";
file_put_contents('resources/views/website/page.blade.php', $pageBlade);

echo "All pages processed.\n";
