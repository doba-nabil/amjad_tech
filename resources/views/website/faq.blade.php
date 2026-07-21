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

         @include('website.partials.breadcrumb', ['title' => __('Faq')])

         <!-- Start faqs-area section -->
         <section class="faqs-area sec-mar-top">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-4">
                         <div class="sidebar-tab">
                             <div class="tabs">
                                 <a href="#progress-tab" class="tab-link active">Progress</a>
                                 <a href="#payment-tab" class="tab-link">Payment</a>
                                 <a href="#support-tab" class="tab-link">Support</a>
                             </div>
                         </div>
                         <div class="sidebar-tab">
                             <div class="questions-form">
                                 <h4>HAVE QUESTION?</h4>
                                 <form action="#" method="post">
                                     <input type="text" name="name" placeholder="Your Name :">
                                     <input type="email" name="email" placeholder="Your Email :">
                                     <input type="text" name="number" placeholder="Phone Number :">
                                     <input type="text" name="subject" placeholder="Subject :">
                                     <textarea name="message" cols="30" rows="10" placeholder="Write Message :"></textarea>
                                     <input type="submit" value="send now">
                                 </form>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-8">
                         <div class="faqs-tabs">
                             <div class="faqs" id="progress-tab">
                                 <h4>Progress</h4>
                                 <div class="accordion" id="accordionOne">
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading1">
                                             <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                 01. Curious about how to build your own UX strategy? Here are.
                                             </button>
                                         </span>
                                         <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading2">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                 02. Where Could a Career in UX Take You? Agency vs. In-House vs?
                                             </button>
                                         </span>
                                         <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading3">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                                 03. What Is a Problem Statement in UX? (And How To Write One)?
                                             </button>
                                         </span>
                                         <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading4">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                 04. There are several techniques UX designers employ to arrive at a?
                                             </button>
                                         </span>
                                         <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading5">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                                 05. What are the obstacles users are facing? What are they trying to?
                                             </button>
                                         </span>
                                         <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading6">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                                 06. Why is this important? Why will users benefit from solving this?
                                             </button>
                                         </span>
                                         <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="faqs" id="payment-tab">
                                 <h4>Payment</h4>
                                 <div class="accordion" id="accordionTwo">
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading7">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                                 01. Aliquam ligula nunc, vehicula at est quis, aliquet facilisis erat?
                                             </button>
                                         </span>
                                         <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading8">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                                 02. In hac habitasse platea dictumst Cras leo erat, laoreet vitae dictum?
                                             </button>
                                         </span>
                                         <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading9">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                                 03. ornare iaculis tellus. Phasellus venenatis vel ligula vitae dictum?
                                             </button>
                                         </span>
                                         <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading10">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                                 04. Phasellus a placerat eros In hac habitasse platea dictumst Fusce ac?
                                             </button>
                                         </span>
                                         <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading11">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                                 05. sagittis risus In porta augue tortor eu condimentum arcu iaculis vel?
                                             </button>
                                         </span>
                                         <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading12">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                                 06. tristique suscipit mi vitae rutrum. Ut auctor rutrum fringilla?
                                             </button>
                                         </span>
                                         <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="faqs" id="support-tab">
                                 <h4>Support</h4>
                                 <div class="accordion" id="accordionThree">
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading13">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                                 01. Curious about how to build your own UX strategy? Here are.
                                             </button>
                                         </span>
                                         <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading14">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                                 02. Where Could a Career in UX Take You? Agency vs. In-House vs?
                                             </button>
                                         </span>
                                         <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading15">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                                 03. What Is a Problem Statement in UX? (And How To Write One)?
                                             </button>
                                         </span>
                                         <div id="collapse15" class="accordion-collapse collapse" aria-labelledby="heading15" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading16">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                                                 04. There are several techniques UX designers employ to arrive at a?
                                             </button>
                                         </span>
                                         <div id="collapse16" class="accordion-collapse collapse" aria-labelledby="heading16" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading17">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                                                 05. What are the obstacles users are facing? What are they trying to?
                                             </button>
                                         </span>
                                         <div id="collapse17" class="accordion-collapse collapse" aria-labelledby="heading17" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                     <div class="accordion-item">
                                         <span class="accordion-header" id="heading18">
                                             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapse18">
                                                 06. Why is this important? Why will users benefit from solving this?
                                             </button>
                                         </span>
                                         <div id="collapse18" class="accordion-collapse collapse" aria-labelledby="heading18" data-bs-parent="#accordionExample">
                                             <div class="accordion-body">
                                                 Aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos only Integer purus odiopl himenaeos. Praesent nec neque at dolor venenatis consectetur eu quis ex. the Donec lacinia andal placerat felis non aliquam.Mauris nec justo vitae ante auctor tol euismod sit amet non ipsum. sovo Praesent commodo at massa eget suscipit. Utani vitae enim velit.
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- End faqs-area section -->

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
                                <form action="#" method="post">
                                    <input type="email" name="email" placeholder="Type Your Email">
                                    <input type="submit" value="connect">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End subscribe-newsletter section -->

     </main>
     <!-- End creasoft-wrap section -->

     <!-- Start footer section -->
@endsection
