@if($monthlyPackages->isEmpty() && $yearlyPackages->isEmpty())
    <div class="row justify-content-center">
        <div class="col-12 text-center py-5">
            <div class="empty-packages-message" style="background: rgba(254, 97, 2, 0.05); border: 1px dashed #fe6102; padding: 40px; border-radius: 10px;">
                <i class="bi bi-box-seam" style="font-size: 48px; color: #fe6102; margin-bottom: 15px; display: inline-block;"></i>
                <h3 style="margin-bottom: 10px; font-weight: 600;">{{ __('dashboard.no_packages_added') ?? 'We are currently updating our pricing plans. Please check back soon!' }}</h3>
            </div>
        </div>
    </div>
@else
    @if($monthlyPackages->isNotEmpty())
    <div class="tab-pane fade active show" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
        <div class="row g-4">
            @foreach($monthlyPackages as $package)
            <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="{{ 200 * $loop->iteration }}ms" data-wow-duration="1500ms">
                <div class="price-box">
                    <h3>{{ $package->name }}</h3>
                    <span>{{ $package->sub_name ?? 'Package' }}</span>
                    
                    <div class="package-prices" data-package-id="{{ $package->id }}">
                        @foreach($package->prices as $price)
                            <strong class="country-price" data-country-id="{{ $price->country_id }}">
                                {{ (float) $price->price }} {{ $price->country->currency_code ?? '' }}<sub>{{ __('dashboard.per_month') ?? '/Per Month' }}</sub>
                            </strong>
                        @endforeach
                        @if($package->prices->isEmpty())
                            <strong>-<sub>{{ __('dashboard.per_month') ?? '/Per Month' }}</sub></strong>
                        @endif
                    </div>

                    <ul class="item-list">
                        @foreach($package->features ?? [] as $feature)
                        <li><i class="bi bi-check"></i>{{ $feature }}</li>
                        @endforeach
                    </ul>
                    <div class="price-btn">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                        <a href="{{ route('checkout', $package->slug) }}?country_id={{ $selectedCountryId }}">{{ __('dashboard.pay_now') ?? 'Pay Now' }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($yearlyPackages->isNotEmpty())
    <div class="tab-pane fade {{ $monthlyPackages->isEmpty() ? 'active show' : '' }}" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab">
        <div class="row g-4">
            @foreach($yearlyPackages as $package)
            <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="{{ 200 * $loop->iteration }}ms" data-wow-duration="1500ms">
                <div class="price-box">
                    <h3>{{ $package->name }}</h3>
                    <span>{{ $package->sub_name ?? 'Package' }}</span>
                    
                    <div class="package-prices" data-package-id="{{ $package->id }}">
                        @foreach($package->prices as $price)
                            <strong class="country-price" data-country-id="{{ $price->country_id }}">
                                {{ (float) $price->price }} {{ $price->country->currency_code ?? '' }}<sub>{{ __('dashboard.per_year') ?? '/Per Year' }}</sub>
                            </strong>
                        @endforeach
                        @if($package->prices->isEmpty())
                            <strong>-<sub>{{ __('dashboard.per_year') ?? '/Per Year' }}</sub></strong>
                        @endif
                    </div>

                    <ul class="item-list">
                        @foreach($package->features ?? [] as $feature)
                        <li><i class="bi bi-check"></i>{{ $feature }}</li>
                        @endforeach
                    </ul>
                    <div class="price-btn">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                        <a href="{{ route('checkout', $package->slug) }}?country_id={{ $selectedCountryId }}">{{ __('dashboard.pay_now') ?? 'Pay Now' }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
@endif
