@extends('welcome')

@section('title')
    {{ $about->page_title }}
@endsection

@section('keywords')
    {{ $about->page_keywords }}
@endsection

@section('description')
    {{ $about->page_description }}
@endsection

@section('style')

<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider/nouislider.css') }}">

@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">{{ $about->title }}<span style="color: #0A72E8 !important;">Who we are</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $about->title }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-text mt-3">
                        {!! $about->description !!}
                    </div><!-- End .about-text -->
                </div><!-- End .col-lg-10 offset-1 -->
            </div><!-- End .row -->
            <div class="row justify-content-center mt-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-puzzle-piece" style="color: #0A72E8 !important;"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title" style="color: #0A72E8 !important;">Design Quality</h3><!-- End .icon-box-title -->
                            <p>We endows a number of qualities and types of packaging. We highly relay on the quality of product <br>not the quantity.</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring" style="color: #0A72E8 !important;"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title" style="color: #0A72E8 !important;">Professional Support</h3><!-- End .icon-box-title -->
                            <p>We are super friendly; our representatives are here to deal with your queries 24/7. Feel free to discuss every minor detail before placing an order. </p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-heart-o" style="color: #0A72E8 !important;"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title" style="color: #0A72E8 !important;">Made With Love</h3><!-- End .icon-box-title -->
                            <p>We provide our own attractive and suitably designed but also manufacture boxes according to the customer’s requirements.</p> 
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div><!-- End .row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-random" style="color: #0A72E8 !important;"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title" style="color: #0A72E8 !important;">Green Sustainable Packaging</h3><!-- End .icon-box-title -->
                            <p>Our boxes are made by 100% recyclable material. Our boxes are made from various stock obtained from recyclable to ribbed and cardboard sheets.</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-dollar" style="color: #0A72E8 !important;"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title" style="color: #0A72E8 !important;">Affordable Price</h3><!-- End .icon-box-title -->
                            <p>You will get best quality boxes in affordable prices. Our prices are lower as compared to current market prices, but our quality is much higher.</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-sm text-center">
                        <span class="icon-box-icon">
                            <i class="icon-codepen" style="color: #0A72E8 !important;"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title" style="color: #0A72E8 !important;">Custom Size & Design</h3><!-- End .icon-box-title -->
                            <p>We serve with customized designs and logos on boxes of your choice according to the definite requirement of products.</p> 
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div><!-- End .row -->
            
        </div><!-- End .container -->
    </div><!-- End .page-content -->
    @include('front.partials._quote')
    
</main><!-- End .main -->

@endsection

@section('script')

<script src="{{ URL::asset('assets/js/nouislider.min.js') }}"></script>

@endsection
