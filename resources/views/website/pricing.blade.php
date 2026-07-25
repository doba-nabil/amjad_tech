@extends('website.layouts.app')

@section('content')
<!-- Start line animation section -->
         <div class="line_wrap">
             <div class="line_item"></div>
             <div class="line_item"></div>
             <div class="line_item"></div>
             <div class="line_item"></div>
             <div class="line_item"></div>
         </div>
         <!-- End line animation section -->

         @include('website.partials.breadcrumb', ['title' => __('dashboard.packages') ?? 'Pricing'])

         <!-- Start priceing-plan section -->
        <section class="priceing-plan sec-mar">
            <div class="container">
                <div class="title-wrap">
                    <div class="sec-title">
                        <span>{{ $settings->home_packages_title ?? "Getting Start" }}</span>
                        <h2>{{ $settings->home_packages_subtitle ?? "Pricing Plan" }}</h2>
                        <p>{{ $settings->home_packages_text ?? "Curabitur sed facilisis erat. Vestibulum pharetra eros eget." }}</p>
                    </div>
                </div>

                @if($pricingCountries->count() > 1)
                <div class="row justify-content-center mb-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <select id="country-select" class="form-select form-select-lg">
                            @foreach($pricingCountries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="price-table-tab">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-monthly-tab" data-bs-toggle="pill" data-bs-target="#pills-monthly" type="button" role="tab" aria-controls="pills-monthly" aria-selected="true">Pay Monthly</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-yearly-tab" data-bs-toggle="pill" data-bs-target="#pills-yearly" type="button" role="tab" aria-controls="pills-yearly" aria-selected="false">Pay Yearly</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    @include('website.partials.packages', ['monthlyPackages' => $monthlyPackages, 'yearlyPackages' => $yearlyPackages])
                </div>
            </div>
        </section>
        <!-- End priceing-plan section -->
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countrySelect = document.getElementById('country-select');
        const tabContent = document.getElementById('pills-tabContent');
        
        if (countrySelect && tabContent) {
            function fetchPackages(countryId) {
                tabContent.style.opacity = '0.5';
                
                fetch(`{{ route('packages.render') }}?country_id=${countryId}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'text/html'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    tabContent.innerHTML = html;
                    tabContent.style.opacity = '1';
                })
                .catch(error => {
                    console.error('Error fetching packages:', error);
                    tabContent.style.opacity = '1';
                });
            }

            countrySelect.addEventListener('change', function() {
                fetchPackages(this.value);
            });

            // Trigger fetch on load for the selected country to ensure correct prices are shown immediately
            if (countrySelect.value) {
                fetchPackages(countrySelect.value);
            }
        }
    });
</script>
@endsection
