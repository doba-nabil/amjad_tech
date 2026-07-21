<?php
$file = 'resources/views/website/layouts/footer.blade.php';
$html = file_get_contents($file);

// 1. Replace logo
$footerLogoReplacement = '{{ isset($settings->footer_logo) ? Storage::url($settings->footer_logo) : (isset($settings->logo) ? Storage::url($settings->logo) : asset("assets/img/logo.svg")) }}';
$html = preg_replace('/<a href="index\.html"><img src=".*?img\/logo\.svg".*?<\/a>/is', '<a href="{{ route(\'home\') }}"><img src="' . $footerLogoReplacement . '" alt="logo"></a>', $html);

// 2. Replace social media icons loop
$socialLogic = <<<HTML
                                <ul class="social-media-icons">
                                    @if(isset(\$settings->social_media) && is_array(\$settings->social_media))
                                        @foreach(\$settings->social_media as \$platform => \$url)
                                            <li><a href="{{ \$url }}"><i class="fab fa-{{ strtolower(\$platform) }}"></i></a></li>
                                        @endforeach
                                    @endif
                                </ul>
HTML;
$html = preg_replace('/<ul class="social-media-icons">.*?<\/ul>/is', $socialLogic, $html);

// 3. Quick Links Replacement
$footerMenuLogic = <<<HTML
                                <ul class="footer-menu">
                                    @if(isset(\$settings->footer_links) && is_array(\$settings->footer_links) && count(\$settings->footer_links) > 0)
                                        @foreach(\$settings->footer_links as \$link)
                                            <li><a href="{{ url(\$link['url']) }}">{{ app()->getLocale() == 'ar' ? (\$link['label_ar'] ?? \$link['label_en']) : (\$link['label_en'] ?? \$link['label_ar']) }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="#">{{ __('dashboard.about_us') ?? 'About Us' }}</a></li>
                                        <li><a href="#">{{ __('dashboard.services') ?? 'Services' }}</a></li>
                                        <li><a href="{{ route('projects') }}">{{ __('dashboard.projects') ?? 'Projects' }}</a></li>
                                        <li><a href="{{ route('blogs') }}">{{ __('dashboard.blogs') ?? 'Blogs' }}</a></li>
                                        <li><a href="{{ route('pricing') }}">{{ __('dashboard.pricing') ?? 'Pricing Plan' }}</a></li>
                                    @endif
                                </ul>
HTML;
$html = preg_replace('/<h4>Quick Links<\/h4>\s*<ul class="footer-menu">.*?<\/ul>/is', "<h4>{{ __('dashboard.quick_links') ?? 'Quick Links' }}</h4>\n" . $footerMenuLogic, $html);

// 4. Contacts
$contactsLogic = <<<HTML
                                <h4>{{ __('dashboard.contact') ?? 'Contacts' }}</h4>
                                <div class="number">
                                    <div class="num-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="phone">
                                        @if(isset(\$settings->phone_numbers) && is_array(\$settings->phone_numbers))
                                            @foreach(\$settings->phone_numbers as \$phone)
                                                <a href="tel:{{ \$phone['phone'] ?? '' }}">{{ \$phone['phone'] ?? '' }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="office-mail">
                                    <div class="mail-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="email">
                                        <a href="mailto:{{ \$settings->email ?? '' }}">{{ \$settings->email ?? '' }}</a>
                                    </div>
                                </div>
                                <div class="address">
                                    <div class="address-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <p>{{ \$settings->address ?? '' }}</p>
                                </div>
HTML;
$html = preg_replace('/<h4>Contacts<\/h4>.*?<\/div>\s*<\/div>\s*<\/div>/is', $contactsLogic . "\n                            </div>", $html);

// 5. Copyright
$html = preg_replace('/Copyright 2022.*?<\/span>/is', 'Copyright {{ date(\'Y\') }} <b>{{ $settings->site_name ?? \'Crea soft\' }}</b> | Developed By {{ $settings->site_name ?? \'Crea soft\' }}</span>', $html);

file_put_contents($file, $html);
echo "Footer updated.";
