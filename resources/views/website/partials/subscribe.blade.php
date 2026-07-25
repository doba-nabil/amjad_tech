<!-- Start subscribe-newsletter section -->
        <section class="subscribe-newsletter sec-mar-top">
            <div class="container">
                <div class="news-letter-content">
                    <div class="row align-items-center">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="subscribe-cnt">
                                <span>Get In Touch</span>
                                <h3>Subscribe Our</h3>
                                <strong>Newsletter</strong>
                            </div>
                        </div>
                        <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="subscribe-form">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <form action="{{ route('subscribe') }}" method="post">
                                    @csrf
                                    <input type="email" name="email" placeholder="Type Your Email" required>
                                    <input type="submit" value="connect">
                                </form>
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End subscribe-newsletter section -->
