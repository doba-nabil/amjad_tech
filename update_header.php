<?php
$file = 'resources/views/website/layouts/header.blade.php';
$html = file_get_contents($file);

$logoReplacement = '{{ isset($settings->logo) ? Storage::url($settings->logo) : asset("assets/img/logo.svg") }}';
$html = preg_replace('/<a href="index\.html"><img src=".*?img\/logo\.svg".*?<\/a>/is', '<a href="{{ route(\'home\') }}"><img src="' . $logoReplacement . '" alt="logo"></a>', $html);

// the mobile menu logo
$mobileLogoReplacement = '{{ isset($settings->logo) ? Storage::url($settings->logo) : asset("assets/img/logo-dark.svg") }}';
$html = preg_replace('/<a href="index\.html"><img src=".*?img\/logo-dark\.svg".*?<\/a>/is', '<a href="{{ route(\'home\') }}"><img src="' . $mobileLogoReplacement . '" alt="logo"></a>', $html);

$menuLogic = <<<HTML
                    @if(isset(\$settings->header_links) && is_array(\$settings->header_links))
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
                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">{{ __('dashboard.home') ?? 'Home' }}</a></li>
                        <li class="{{ request()->routeIs('projects') ? 'active' : '' }}"><a href="{{ route('projects') }}">{{ __('dashboard.projects') ?? 'Projects' }}</a></li>
                        <li class="{{ request()->routeIs('blogs') ? 'active' : '' }}"><a href="{{ route('blogs') }}">{{ __('dashboard.blogs') ?? 'Blogs' }}</a></li>
                        <li class="{{ request()->routeIs('pricing') ? 'active' : '' }}"><a href="{{ route('pricing') }}">{{ __('dashboard.pricing') ?? 'Pricing' }}</a></li>
                        <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">{{ __('dashboard.contact') ?? 'Contact Us' }}</a></li>
                    @endif
HTML;

$html = preg_replace('/<ul>.*?<\/ul>/is', "<ul>\n" . $menuLogic . "\n                </ul>", $html, 1);

file_put_contents($file, $html);
echo "Header updated.\n";
