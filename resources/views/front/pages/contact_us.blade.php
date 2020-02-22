@extends('welcome')

@section('title')
    {{ 'Packaging Expert | Contact us'  }}
@endsection

@section('keywords')
    {{ 'Packaging Expert | Contact us' }}
@endsection

@section('description')
    {{ 'Packaging Expert | Contact us' }}
@endsection

@section('style')

<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider/nouislider.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

<style>

.btn-outline-primary-2 {
    border: 1px solid #0A72E8 !important;
    color: #0A72E8 !important;
}
.btn-outline-primary-2:hover {
    background-color: #0A72E8 !important;
    color: #ffffff !important;
}

</style>

@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Get in touch<span style="color: #0A72E8 !important;">Contact us</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div id="map" class="text-center mb-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3035.583674302107!2d-74.32954998510388!3d40.46235066078849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3c9439725095d%3A0xfcd7cf9183b7de36!2s101%20Lakeview%20Dr%2C%20Parlin%2C%20NJ%2008859%2C%20USA!5e0!3m2!1sen!2s!4v1578220277143!5m2!1sen!2s" width="1920" height="495" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div><!-- End #map -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Office</h3>

                        <address>{{ $contact->street_address }}, {{ $contact->city }}<br>{{ $contact->state }}&nbsp;{{ $contact->zip }}, {{ $contact->country }}</address>
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Start a Conversation</h3>

                        <div><a href="mailto:#">{{ $contact->email }}</a></div>
                        <div><a href="tel:#">+{{ $contact->phone }}</a></div>
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Social</h3>

                        <div class="social-icons social-icons-color justify-content-center">
                            <a href="{{ isset($contact->facebook) ? 'https://' . $contact->facebook : '#' }}" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="{{ isset($contact->twitter) ? 'https://' . $contact->twitter : '#' }}" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="{{ isset($contact->instagram) ? 'https://' . $contact->instagram : '#' }}" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="{{ isset($contact->youtube) ? 'https://' . $contact->youtube : '#' }}" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                            <a href="{{ isset($contact->pinterest) ? 'https://' . $contact->pinterest : '#' }}" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->
            </div><!-- End .row -->

            <hr class="mt-3 mb-5 mt-md-1">
            @if (Session::has('success'))
              <div class="alert alert-icon-left alert-arrow-left alert-success alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong>Well done!</strong> <span style="font-weight: 500;">{{ Session::get('success') }}</span>
              </div>
              <script>
                /*
                $(document).ready(function(){
                    setTimeout(function(){ toastr.success("{{ Session::get('success') }}", 'Custom Boxes Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
                });
                */
              </script>
            @endif
            @if (count($errors) > 0)
                <div class="row justify-content-center">
                  <div class="col-md-9 col-lg-7">
                      <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</b>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </div>
                  </div>
                </div>
                <script>
                /*
                    $(document).ready(function(){
                        setTimeout(function(){ toastr.error('You must fill in all of the required fields!', 'Vista Network Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
                    }); */

                </script>
            @endif
            <br/>
            <div class="touch-container row justify-content-center bg-light-2 pt-4 pb-4">
                <div class="col-md-9 col-lg-7">
                    <div class="text-center">
                        <h2 class="title mb-1">Get In Touch</h2><!-- End .title mb-2 -->
                        <p class="lead mb-3" style="color: red !important;">
                            We collaborate with ambitious brands and people; we’d love to build something great together.
                        </p><!-- End .lead text-primary -->
                    </div><!-- End .text-center -->

                    <form action="{{ route('contact_us.store') }}" method="post" class="contact-form mb-2">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cname" class="sr-only">Name</label>
                                <input type="text" class="form-control" id="cname" name="full_name" placeholder="Name *" required>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-6">
                                <label for="cemail" class="sr-only">Name</label>
                                <input type="email" class="form-control" id="cemail" name="email" placeholder="Email *" required>
                            </div><!-- End .col-sm-4 -->
                        </div><!-- End .row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="csubject" class="sr-only">Subject</label>
                                <input type="text" class="form-control" id="csubject" name="subject" placeholder="Subject *" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="cmessage" class="sr-only">Message</label>
                                <textarea class="form-control" cols="30" rows="4" id="cmessage" name="message" required placeholder="Message *"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <label for="cmessage" class="sr-only">Captcha</label>
                                {!! NoCaptcha::renderJs() !!}
                                <div style="display: inline-block;">
                                    {!! NoCaptcha::display() !!}
                                </div>
                            </div>
                            @if ($errors->has('g-recaptcha-response'))
                                <small class="text-danger">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                        <span>SUBMIT</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .text-center -->
                            </div>
                        </div>
                    </form><!-- End .contact-form -->
                </div><!-- End .col-md-9 col-lg-7 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
    @include('front.partials._quote')
</main><!-- End .main -->

@endsection

@section('script')

<script src="{{ URL::asset('assets/js/nouislider.min.js') }}"></script>

@endsection
