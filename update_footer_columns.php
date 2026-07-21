<?php
$file = 'resources/views/website/layouts/footer.blade.php';
$content = file_get_contents($file);

$col1Logic = <<<HTML
                                <ul class="footer-menu">
                                    @php \$col1 = collect(\$settings->footer_links ?? [])->where('column', '1'); @endphp
                                    @if(\$col1->count() > 0)
                                        @foreach(\$col1 as \$link)
                                            <li><a href="{{ url(\$link['url']) }}">{{ app()->getLocale() == 'ar' ? (\$link['label_ar'] ?? \$link['label_en']) : (\$link['label_en'] ?? \$link['label_ar']) }}</a></li>
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
HTML;

$content = preg_replace('/<h4>Our Services<\/h4>\s*<ul class="footer-menu">.*?<\/ul>/is', "<h4>{{ __('dashboard.column_1') ?? 'Our Services' }}</h4>\n" . $col1Logic, $content);

$col2Logic = <<<HTML
                                <ul class="footer-menu">
                                    @php \$col2 = collect(\$settings->footer_links ?? [])->where('column', '2'); @endphp
                                    @if(\$col2->count() > 0)
                                        @foreach(\$col2 as \$link)
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

$content = preg_replace('/<h4>\{\{ __\(\'dashboard\.quick_links\'\).*?<\/h4>\s*<ul class="footer-menu">.*?<\/ul>/is', "<h4>{{ __('dashboard.column_2') ?? 'Quick Links' }}</h4>\n" . $col2Logic, $content);

file_put_contents($file, $content);
echo "Footer columns updated.";
