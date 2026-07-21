<footer>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="footer-widget">
                                <div class="footer-logo">
                                    <a href="{{ route('home') }}"><img src="{{ isset($settings->footer_logo) ? Storage::url($settings->footer_logo) : (isset($settings->logo) ? Storage::url($settings->logo) : asset("assets/img/logo.svg")) }}" alt="logo" style="filter: brightness(0) invert(1);"></a>
                                </div>
                                <p>{{ $settings->footer_text ?? '' }}</p>
                                                                <ul class="social-media-icons">
                                    @if(isset($settings->social_media) && is_array($settings->social_media))
                                        @foreach($settings->social_media as $platform => $url)
                                            <li><a href="{{ $url }}"><i class="fab fa-{{ strtolower($platform) }}"></i></a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="footer-widget">
                                <h4>{{ __('dashboard.column_1') ?? 'Our Services' }}</h4>
                                <ul class="footer-menu">
                                    @php $col1 = collect($settings->footer_links ?? [])->where('column', '1'); @endphp
                                    @if($col1->count() > 0)
                                        @foreach($col1 as $link)
                                            <li><a href="{{ url($link['url']) }}">{{ app()->getLocale() == 'ar' ? ($link['label_ar'] ?? $link['label_en']) : ($link['label_en'] ?? $link['label_ar']) }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="service-details.html">Strategy &amp; Research</a></li>
                                        <li><a href="service-details.html">Web Development</a></li>
                                        <li><a href="service-details.html">Web Solution</a></li>
                                        <li><a href="service-details.html">Digital Merketing</a></li>
                                        <li><a href="service-details.html">App Design</a></li>
                                        <li><a href="service-details.html">App Development</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="footer-widget">
                                <h4>{{ __('dashboard.column_2') ?? 'Quick Links' }}</h4>
                                <ul class="footer-menu">
                                    @php $col2 = collect($settings->footer_links ?? [])->where('column', '2'); @endphp
                                    @if($col2->count() > 0)
                                        @foreach($col2 as $link)
                                            <li><a href="{{ url($link['url']) }}">{{ app()->getLocale() == 'ar' ? ($link['label_ar'] ?? $link['label_en']) : ($link['label_en'] ?? $link['label_ar']) }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#">{{ __('dashboard.about_us') ?? 'About Us' }}</a></li>
                                        <li><a href="#">{{ __('dashboard.services') ?? 'Services' }}</a></li>
                                        <li><a href="{{ route('projects') }}">{{ __('dashboard.projects') ?? 'Projects' }}</a></li>
                                        <li><a href="{{ route('blogs') }}">{{ __('dashboard.blogs') ?? 'Blogs' }}</a></li>
                                        <li><a href="{{ route('pricing') }}">{{ __('dashboard.pricing') ?? 'Pricing Plan' }}</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <div class="footer-widget">
                                                                <h4>{{ __('dashboard.contact') ?? 'Contacts' }}</h4>
                                <div class="number">
                                    <div class="num-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="phone">
                                        @if(isset($settings->phone_numbers) && is_array($settings->phone_numbers))
                                            @foreach($settings->phone_numbers as $phone)
                                                <a href="tel:{{ $phone['phone'] ?? '' }}">{{ $phone['phone'] ?? '' }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="office-mail">
                                    <div class="mail-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="email">
                                        <a href="mailto:{{ $settings->email ?? '' }}">{{ $settings->email ?? '' }}</a>
                                    </div>
                                </div>
                                <div class="address">
                                    <div class="address-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <p>{{ $settings->address ?? '' }}</p>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4 col-lg-4 col-xl-5">
                            <div class="copy-txt">
                                <span>Copyright {{ date('Y') }} <b>{{ $settings->site_name ?? 'Crea soft' }}</b> | Developed By {{ $settings->site_name ?? 'Crea soft' }}</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-8 col-xl-7">
                            <ul class="footer-bottom-menu">
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Use</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>