@extends('welcome')

@section('style')

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
            <h1 class="page-title">Request a Quote<span>Get a free quote</span></h1>
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
                    <h2 class="title text-success mb-1">Thank you!</h2><!-- End .title mb-2 -->
                    <p class="lead">
                        Your quote request has been successfully submited.
                    </p><!-- End .lead text-primary -->
                    </div><!-- End .text-center -->
                </div>
            </div>
            
            <div class="row justify-content-center mt-4">
                <div class="col-md-10 col-lg-10 text-center">
                    <a href="{{ route('quote.index') }}" class="btn btn-primary btn-rounded">Request Another Quote</a>
                </div><!-- End .col-md-10 col-lg-10 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection

@section('script')
@endsection
