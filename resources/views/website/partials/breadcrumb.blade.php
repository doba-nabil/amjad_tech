        <!-- Start breadcrumbs section -->
        <section class="breadcrumbs" @if(isset($banner) && $banner) style="background-image: url('{{ Storage::url($banner) }}');" @endif>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrapper">
                            <div class="breadcrumb-cnt">
                                <h1>{{ $title }}</h1>
                                <span><a href="{{ route('home') }}">{{ __('Home') }}</a><i class="bi bi-arrow-right"></i>{{ $title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumbs section -->
