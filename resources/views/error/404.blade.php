@extends('welcome')

@section('title')
    {{ 'Packaging Xpert | Error 404' }}
@endsection

@section('keywords')
    {{ 'Packaging Xpert' }}
@endsection

@section('description')
    {{ 'Packaging Xpert' }}
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
	<!-- <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Error 404<span style="color: #0A72E8 !important;">Page not found!</span></h1>
        </div>
    </div> --><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">404</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

	<div class="error-content text-center bg-light-2">
    	<div class="container">
    		<h1 class="error-title" style="color: red;">Error 404</h1><!-- End .error-title -->
    		<p style="color: #000;">We are sorry, the page you've requested is not available.</p>
    		<a href="{{ route('home.index') }}" class="btn btn-outline-primary-2 btn-minwidth-lg">
    			<span>BACK TO HOMEPAGE</span>
    			<i class="icon-long-arrow-right"></i>
    		</a>
    		<p class="mt-2" style="color: #000;">or contact us at</p>
    		<p><a href="javascript:;" style="font-weight: 600; color: #000;">{{ $email }}</a></p>
    	</div><!-- End .container -->
	</div><!-- End .error-content text-center -->
	@include('front.partials._quote')
</main><!-- End .main -->

@endsection

@section('script')
@endsection
