@extends('welcome')

@section('title')
    {{ 'Packaging Expert | Request a Quote'  }}
@endsection

@section('keywords')
    {{ 'Packaging Expert | Request a Quote' }}
@endsection

@section('description')
    {{ 'Packaging Expert | Request a Quote' }}
@endsection

@section('style')

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
            <h1 class="page-title">Request a Quote<span style="color: #0A72E8 !important;">Get a free quote</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Request a Quote</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <hr class="mt-3 mb-5 mt-md-0">
            <div class="touch-container row justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="text-center">
                    <h2 class="title mb-1">Request a Custom Quote</h2><!-- End .title mb-2 -->
                    <p class="lead" style="color: red !important;">
                        Let us know what you need! Box dimensions, quantities of boxes you need, design. We can help.
                    </p><!-- End .lead text-primary -->
                    </div><!-- End .text-center -->
                </div>
            </div>
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
                  <div class="col-md-10 col-lg-10">
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
            <div class="row justify-content-center bg-light-2 pt-4 pb-4 mt-4">
                <div class="col-md-10 col-lg-10">
                    <form method="post" action="{{ route('quote.store') }}" class="contact-form mb-2">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="cname" style="font-weight: 600;">Name <span style="font-weight: 600; color: red !important;">*</span></label>
                                <input type="text" class="form-control" id="cname" name="full_name" placeholder="Name *" required>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-4">
                                <label for="cemail" style="font-weight: 600;">Email <span style="font-weight: 600; color: red !important;">*</span></label>
                                <input type="email" class="form-control" id="cemail" name="email" placeholder="Email *" required>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-4">
                                <label for="cphone" style="font-weight: 600;">Phone <span style="font-weight: 600; color: red !important;">*</span></label>
                                <input type="tel" class="form-control" id="cphone" name="phone" placeholder="Phone *" required>
                            </div><!-- End .col-sm-4 -->
                        </div><!-- End .row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cboxtype" style="font-weight: 600;">Box Type <span style="font-weight: 600; color: red !important;">*</span></label>
                                <select id="cboxtype" name="box_type" class="form-control" required>
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                    @endforeach
                                </select>    
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label for="cstock" style="font-weight: 600;">Stock</label>
                                <select id="cstock" name="stock" class="form-control">
                                    <option value="12pt Cardboard Stock">12pt Cardboard Stock</option>
                                    <option value="14pt Cardboard Stock">14pt Cardboard Stock</option>
                                    <option value="16pt Cardboard Stock">16pt Cardboard Stock</option>
                                    <option value="18pt Cardboard Stock">18pt Cardboard Stock</option>
                                    <option value="20pt Cardboard Stock">20pt Cardboard Stock</option>
                                    <option value="22pt Cardboard Stock">22pt Cardboard Stock</option>
                                    <option value="24pt Cardboard Stock">24pt Cardboard Stock</option>
                                    <option value="Kraft Stock">Kraft Stock</option>
                                    <option value="Recycled BuxBoard">Recycled BuxBoard</option>
                                    <option value="Corrugated Stock">Corrugated Stock</option>
                                    <option value="No Printing Requird">No Printing Requird</option>
                                </select>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="width" style="font-weight: 600;">Width</label>
                                <input type="text" class="form-control" id="width" name="width" placeholder="Width">
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-4">
                                <label for="height" style="font-weight: 600;">Height</label>
                                <input type="text" class="form-control" id="height" name="height" placeholder="Height">
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-4">
                                <label for="length" style="font-weight: 600;">Length</label>
                                <input type="text" class="form-control" id="length" name="length" placeholder="Length">
                            </div><!-- End .col-sm-4 -->
                        </div><!-- End .row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="unit" style="font-weight: 600;">Unit</label>
                                <select id="unit" name="unit" class="form-control">
                                    <option value="CM">CM</option>
                                    <option value="MM">MM</option>
                                    <option value="INCHES">INCHES</option>
                                    <option value="FEET">FEET</option>
                                </select>
                            </div><!-- End .col-sm-4 -->
                            <div class="col-sm-4">
                                <label for="colors" style="font-weight: 600;">Colors</label>
                                <select id="colors" name="colors" class="form-control">
                                    <option value="None">None</option>
                                    <option value="1 Color">1 Color</option>
                                    <option value="2 Color">2 Color</option>
                                    <option value="3 Color">3 Color</option>
                                    <option value="4 Color">4 Color</option>
                                    <option value="4/1 Color">4/1 Color</option>
                                    <option value="4/2 Color">4/2 Color</option>
                                    <option value="4/3 Color">4/3 Color</option>
                                    <option value="4/4 Color">4/4 Color</option>
                                </select>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-4">
                                <label for="quantity" style="font-weight: 600;">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="1">
                            </div><!-- End .col-sm-4 -->
                        </div><!-- End .row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="comments" style="font-weight: 600;">Additional Comments</label>
                                <textarea class="form-control" cols="30" rows="4" id="comments" name="comments" placeholder="Additional comments"></textarea>
                            </div><!-- End .col-sm-12 -->
                        </div><!-- End .row -->
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                {!! NoCaptcha::renderJs() !!}
                                <div id="captcha" style="display: inline-block;">
                                    {!! NoCaptcha::display() !!}
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                @if ($errors->has('g-recaptcha-response'))
                                    <small class="text-danger">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
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
@endsection
