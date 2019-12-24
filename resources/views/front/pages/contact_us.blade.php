@extends('welcome')

@section('style')

<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider/nouislider.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

<script>

$(document).ready(function(){

    $(".filter_cat").click(function(){
        var cat_id = $(this).val();
        alert(id);        
    });

});

</script>

@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Get in touch<span>Contact us</span></h1>
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
        <div id="map" class="mb-5"></div><!-- End #map -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Office</h3>

                        <address>1 New York Plaza, New York, <br>NY 10004, USA</address>
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Start a Conversation</h3>

                        <div><a href="mailto:#">info@Molla.com</a></div>
                        <div><a href="tel:#">+1 987-876-6543</a>, <a href="tel:#">+1 987-976-1234</a></div>
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Social</h3>

                        <div class="social-icons social-icons-color justify-content-center">
                            <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
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
            <div class="touch-container row justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="text-center">
                    <h2 class="title mb-1">Get In Touch</h2><!-- End .title mb-2 -->
                    <p class="lead text-primary">
                        We collaborate with ambitious brands and people; we’d love to build something great together.
                    </p><!-- End .lead text-primary -->
                    <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
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
</main><!-- End .main -->

@endsection

@section('script')

<script src="{{ URL::asset('assets/js/nouislider.min.js') }}"></script>

@endsection
