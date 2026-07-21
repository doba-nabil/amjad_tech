<?php
$file = 'resources/views/website/layouts/header.blade.php';
$content = file_get_contents($file);

// Find the main nav list from <nav class="main-nav"> to <div class="get-qoute d-flex
$pattern = '/<nav class="main-nav">.*?<ul>.*?<\/ul>.*?<div class="get-qoute d-flex/is';

$new_nav = <<<HTML
<nav class="main-nav">
                <div class="mobile-menu-logo">
                    <a href="{{ route('home') }}"><img src="{{ isset(\$settings->logo) ? Storage::url(\$settings->logo) : asset('assets/img/logo-dark.svg') }}" alt="logo"></a>
                    <div class="remove">
                        <i class="bi bi-plus-lg"></i>
                    </div>
                </div>
                <ul>
                    @if(isset(\$settings->header_links) && is_array(\$settings->header_links) && count(\$settings->header_links) > 0)
                        @foreach(\$settings->header_links as \$link)
                            @if(isset(\$link['is_dropdown']) && \$link['is_dropdown'])
                                <li class="has-child {{ request()->is(ltrim(\$link['url'], '/').'*') ? 'active' : '' }}">
                                    <a href="{{ \$link['url'] == '#' ? 'javascript:void(0)' : url(\$link['url']) }}">{{ app()->getLocale() == 'ar' ? (\$link['label_ar'] ?? \$link['label_en']) : (\$link['label_en'] ?? \$link['label_ar']) }}</a>
                                    <i class="bi bi-chevron-down"></i>
                                    @if(isset(\$link['children']) && is_array(\$link['children']))
                                        <ul class="sub-menu">
                                            @foreach(\$link['children'] as \$child)
                                                <li><a href="{{ url(\$child['url']) }}">{{ app()->getLocale() == 'ar' ? (\$child['label_ar'] ?? \$child['label_en']) : (\$child['label_en'] ?? \$child['label_ar']) }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @else
                                <li class="{{ request()->is(ltrim(\$link['url'], '/').'*') ? 'active' : '' }}">
                                    <a href="{{ url(\$link['url']) }}">{{ app()->getLocale() == 'ar' ? (\$link['label_ar'] ?? \$link['label_en']) : (\$link['label_en'] ?? \$link['label_ar']) }}</a>
                                </li>
                            @endif
                        @endforeach
                    @else
                        <!-- Default Fallback if no links are set -->
                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a></li>
                        <li class="{{ request()->routeIs('projects') ? 'active' : '' }}"><a href="{{ route('projects') }}">{{ app()->getLocale() == 'ar' ? 'المشاريع' : 'Projects' }}</a></li>
                        <li class="{{ request()->routeIs('blogs') ? 'active' : '' }}"><a href="{{ route('blogs') }}">{{ app()->getLocale() == 'ar' ? 'المقالات' : 'Blogs' }}</a></li>
                        <li class="{{ request()->routeIs('pricing') ? 'active' : '' }}"><a href="{{ route('pricing') }}">{{ app()->getLocale() == 'ar' ? 'الباقات' : 'Pricing' }}</a></li>
                        <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">{{ app()->getLocale() == 'ar' ? 'تواصل معنا' : 'Contact Us' }}</a></li>
                    @endif
                </ul>
                <div class="get-qoute d-flex
HTML;

$content = preg_replace($pattern, $new_nav, $content, 1);
file_put_contents($file, $content);
echo "Header fixed.";
