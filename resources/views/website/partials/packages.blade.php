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
                            {{ $price->price }}<sub>/Per Month</sub>
                        </strong>
                    @endforeach
                    @if($package->prices->isEmpty())
                        <strong>-<sub>/Per Month</sub></strong>
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
                    <a href="{{ route('checkout', $package->slug) }}?country_id={{ $selectedCountryId }}">Pay Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab">
    <div class="row g-4">
        @foreach($yearlyPackages as $package)
        <div class="col-md-6 col-lg-4 wow animate fadeInUp" data-wow-delay="{{ 200 * $loop->iteration }}ms" data-wow-duration="1500ms">
            <div class="price-box">
                <h3>{{ $package->name }}</h3>
                <span>{{ $package->sub_name ?? 'Package' }}</span>
                
                <div class="package-prices" data-package-id="{{ $package->id }}">
                    @foreach($package->prices as $price)
                        <strong class="country-price" data-country-id="{{ $price->country_id }}">
                            {{ $price->price }}<sub>/Per Year</sub>
                        </strong>
                    @endforeach
                    @if($package->prices->isEmpty())
                        <strong>-<sub>/Per Year</sub></strong>
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
                    <a href="{{ route('checkout', $package->slug) }}?country_id={{ $selectedCountryId }}">Pay Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
