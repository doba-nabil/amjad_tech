@extends('website.layouts.app')

@section('title', __('dashboard.faq') ?? 'FAQ')
@section('meta_description', __('dashboard.faq_meta_desc') ?? 'Frequently Asked Questions.')

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

         @include('website.partials.breadcrumb', ['title' => __('dashboard.faqs') ?? 'FAQs', 'banner' => $settings->other_pages_banner ?? null])

         <!-- Start faqs-area section -->
         <section class="faqs-area sec-mar-top">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-4">
                         <div class="sidebar-tab">
                             <div class="questions-form">
                                 <h4>HAVE QUESTION?</h4>
                                 <form action="{{ route('contact.submit') }}" method="post">
                                     @csrf
                                     <input type="text" name="name" placeholder="Your Name :" required>
                                     <input type="email" name="email" placeholder="Your Email :" required>
                                     <input type="text" name="phone" placeholder="Phone Number :">
                                     <input type="text" name="subject" placeholder="Subject :">
                                     <textarea name="message" cols="30" rows="10" placeholder="Write Message :" required></textarea>
                                     <input type="submit" value="send now">
                                 </form>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-8">
                         <div class="faqs-tabs">
                             <div class="faqs" id="progress-tab">
                                 <h4>Frequently Asked Questions</h4>
                                 <div class="accordion" id="accordionOne">
                                     @foreach($faqs as $index => $faq)
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading{{ $index }}">
                                             <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                                 {{ sprintf('%02d', $index + 1) }}. {{ $faq->question }}
                                             </button>
                                         </span>
                                         <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionOne">
                                             <div class="accordion-body">
                                                 {!! $faq->answer !!}
                                             </div>
                                         </div>
                                     </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- End faqs-area section -->
@endsection
