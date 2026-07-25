<header class="header-area position_top">
        <div class="site-logo">
            <div class="logo">
                <a href="{{ route('home') }}"><img loading="lazy" src="{{ isset($settings->logo) ? Storage::url($settings->logo) : asset("assets/img/logo.svg") }}" alt="logo" style='filter: brightness(0) invert(1);'></a>
            </div>
        </div>
        <div class="main-menu">
            <nav class="main-nav">
                <div class="mobile-menu-logo">
                    <a href="{{ route('home') }}"><img loading="lazy" src="{{ isset($settings->logo) ? Storage::url($settings->logo) : asset('assets/img/logo-dark.svg') }}" alt="logo"></a>
                    <div class="remove">
                        <i class="bi bi-plus-lg"></i>
                    </div>
                </div>
                <ul>
                    @if(isset($settings->header_links) && is_array($settings->header_links) && count($settings->header_links) > 0)
                        @foreach($settings->header_links as $link)
                            @php
                                $cleanUrl = ltrim($link['url'], '/');
                                $isActive = false;
                                if ($cleanUrl === '') {
                                    $isActive = request()->path() === '/' || request()->path() === app()->getLocale();
                                } elseif ($cleanUrl !== '#') {
                                    $isActive = request()->is($cleanUrl . '*') || request()->is(app()->getLocale() . '/' . $cleanUrl . '*');
                                }
                                $href = $link['url'] === '#' ? 'javascript:void(0)' : (str_starts_with($link['url'], 'http') ? $link['url'] : \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL(app()->getLocale(), $link['url']));
                            @endphp
                            @if(isset($link['is_dropdown']) && $link['is_dropdown'])
                                <li class="has-child">
                                    <a class="{{ $isActive ? 'active' : '' }}" href="{{ $href }}">{{ app()->getLocale() == 'ar' ? ($link['label_ar'] ?? $link['label_en']) : ($link['label_en'] ?? $link['label_ar']) }}</a>
                                    <i class="bi bi-chevron-down"></i>
                                    @if(isset($link['children']) && is_array($link['children']))
                                        <ul class="sub-menu">
                                            @foreach($link['children'] as $child)
                                                @php
                                                    $childHref = $child['url'] === '#' ? 'javascript:void(0)' : (str_starts_with($child['url'], 'http') ? $child['url'] : \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL(app()->getLocale(), $child['url']));
                                                @endphp
                                                <li><a href="{{ $childHref }}">{{ app()->getLocale() == 'ar' ? ($child['label_ar'] ?? $child['label_en']) : ($child['label_en'] ?? $child['label_ar']) }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @else
                                <li>
                                    <a class="{{ $isActive ? 'active' : '' }}" href="{{ $href }}">{{ app()->getLocale() == 'ar' ? ($link['label_ar'] ?? $link['label_en']) : ($link['label_en'] ?? $link['label_ar']) }}</a>
                                </li>
                            @endif
                        @endforeach
                    @else
                        <!-- Default Fallback if no links are set -->
                        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a></li>
                        <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">{{ app()->getLocale() == 'ar' ? 'المشاريع' : 'Projects' }}</a></li>
                        <li><a href="{{ route('blogs') }}" class="{{ request()->routeIs('blogs') ? 'active' : '' }}">{{ app()->getLocale() == 'ar' ? 'المقالات' : 'Blogs' }}</a></li>
                        <li><a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'active' : '' }}">{{ app()->getLocale() == 'ar' ? 'الباقات' : 'Pricing' }}</a></li>
                        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ app()->getLocale() == 'ar' ? 'تواصل معنا' : 'Contact Us' }}</a></li>
                    @endif
                </ul>
                <div class="get-qoute d-flex justify-content-center d-lg-none d-block pt-50">
                    <div class="cmn-btn">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                        <a href="{{ route('contact') }}">{{ app()->getLocale() == 'ar' ? 'اطلب تسعيرة' : 'Get A Quote' }}</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="nav-right" style="display: flex; align-items: center; gap: 15px;">
            <div class="lang-switch">
                @if(app()->getLocale() == 'ar')
                    <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('en', null, [], true) }}" style="color: #fff; font-weight: bold; padding: 5px 10px; border: 1px solid rgba(255,255,255,0.3); border-radius: 5px;">EN</a>
                @else
                    <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" style="color: #fff; font-weight: bold; padding: 5px 10px; border: 1px solid rgba(255,255,255,0.3); border-radius: 5px;">AR</a>
                @endif
            </div>
            <div class="get-qoute">
                <div class="cmn-btn">
                    <div class="line-1"></div>
                    <div class="line-2"></div>
                    <a href="{{ route('contact') }}">{{ app()->getLocale() == 'ar' ? 'اطلب تسعيرة' : 'Get A Quote' }}</a>
                </div>
            </div>
            <div class="mobile-menu">
                <a href="javascript:void(0)" class="cross-btn">
                    <span class="cross-top"></span>
                    <span class="cross-middle"></span>
                    <span class="cross-bottom"></span>
                </a>
            </div>
        </div>
    </header>
