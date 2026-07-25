@extends('website.layouts.app')

@section('title', __('dashboard.contact') ?? 'Contact Us')
@section('meta_description', __('dashboard.contact_desc') ?? 'Get in touch with us for any inquiries or support.')

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

        @include('website.partials.breadcrumb', ['title' => __('dashboard.contact') ?? 'Contact Us'])

        <!-- Start contact-area section -->
        <section class="contact-area sec-mar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <div class="contact-left">
                            <div class="sec-title layout2">
                                <span>Get in touch</span>
                                <h2>Contact us if you have more questions.</h2>
                            </div>
                            <ul class="social-media-icons d-flex mt-4" style="gap: 15px; list-style: none; padding-left: 0;">
                                @if(isset($settings->social_media) && is_array($settings->social_media) && count($settings->social_media) > 0)
                                    @foreach($settings->social_media as $platform => $url)
                                        <li><a href="{{ $url }}" style="font-size: 20px; color: #fff;"><i class="fab fa-{{ strtolower($platform) }}"></i></a></li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="informations">
                                <div class="single-info">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="info">
                                        <h3>Location</h3>
                                        <p>{{ $settings->contact_address ?? '65a Mill St E, Acton, Ontario, L7J 1H3, Canada' }}</p>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="info">
                                        <h3>Phone</h3>
                                        <a href="tel:{{ $settings->contact_phone ?? '0096541041383' }}">{{ $settings->contact_phone ?? '+965 41041383' }}</a>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <div class="icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="info">
                                        <h3>Email</h3>
                                        <a href="mailto:{{ $settings->contact_email ?? 'info@hipsera.com' }}">{{ $settings->contact_email ?? 'info@hipsera.com' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                @if($settings->contact_lat && $settings->contact_lng)
                                    <iframe src="https://maps.google.com/maps?q={{ $settings->contact_lat }},{{ $settings->contact_lng }}&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                                @else
                                    <iframe src="https://maps.google.com/maps?q=dhaka%20bangladesh&t=&z=9&ie=UTF8&iwloc=&output=embed"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="getin-touch">
                    <div class="row">
                        <div class="col-md-6 col-lg-7">
                            <div class="contact-form wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <h3>Have Any Questions</h3>
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <form action="{{ route('contact.submit') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" name="name" placeholder="Enter your name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" placeholder="Enter your email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="phone_input_display" placeholder="Enter your phone" required>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="subject" placeholder="Subject" required>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="message" cols="30" rows="10" placeholder="Your message" required></textarea>
                                            <input type="submit" value="Send Message">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 wow animate fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="call-banner">
                                <img src="{{ asset('assets/') }}/img/call-center.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End contact-area section -->
@endsection

@section('scripts')
<style>
    .iti {
        width: 100%;
    }
    .iti input {
        padding-left: 52px !important;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var input = document.querySelector("#phone_input_display");
        if (input) {
            var iti = window.intlTelInput(input, {
                initialCountry: "auto",
                excludeCountries: ["il"],
                hiddenInput: "phone",
                geoIpLookup: function(callback) {
                    fetch("https://ipapi.co/json")
                        .then(function(res) { return res.json(); })
                        .then(function(data) { callback(data.country_code); })
                        .catch(function() { callback("us"); });
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });
            
            // On form submit, sync the hidden input with the full international number
            input.closest("form").addEventListener("submit", function() {
                var hiddenInput = input.closest("form").querySelector("input[name='phone']");
                if (hiddenInput) {
                    hiddenInput.value = iti.getNumber();
                }
            });
        }
    });
</script>
@endsection
