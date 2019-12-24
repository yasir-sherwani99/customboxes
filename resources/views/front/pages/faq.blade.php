@extends('welcome')

@section('style')

<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider/nouislider.css') }}">

@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">F.A.Q<span>General</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <h2 class="title text-center mb-3">Frequently Asked Questions</h2><!-- End .title -->
            <div class="accordion accordion-rounded" id="accordion-1">
                @foreach($faqs as $key => $data)
                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading-{{ $key }}">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-{{ $key }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $key }}">
                                {{ $data->question }}
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse-{{ $key }}" class="collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $key }}" data-parent="#accordion-1">
                        <div class="card-body">
                            {{ $data->answer }} 
                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->
                @endforeach
            </div><!-- End .accordion -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

    <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url(assets/images/backgrounds/cta/bg-7.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-7">
                    <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                        <div class="col">
                            <h3 class="cta-title text-white">If You Have More Questions</h3><!-- End .cta-title -->
                            <p class="cta-desc text-white">Feel free to contact us</p><!-- End .cta-desc -->
                        </div><!-- End .col -->

                        <div class="col-auto">
                            <a href="{{ route('contact_us.index') }}" class="btn btn-outline-white"><span>CONTACT US</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .col-auto -->
                    </div><!-- End .row no-gutters -->
                </div><!-- End .col-md-10 col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->
</main><!-- End .main -->

@endsection

@section('script')

<script src="{{ URL::asset('assets/js/nouislider.min.js') }}"></script>

@endsection
