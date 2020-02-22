@extends('welcome')

@section('title')
    {{ 'Packaging Expert | Frequently Asked Questions'  }}
@endsection

@section('keywords')
    {{ 'Packaging Expert | Frequently Asked Questions' }}
@endsection

@section('description')
    {{ 'Packaging Expert | Frequently Asked Questions' }}
@endsection

@section('style')

<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider/nouislider.css') }}">

@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">F.A.Q<span style="color: #0A72E8 !important;">How can we help you?</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
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
                            {!! $data->answer !!} 
                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->
                @endforeach
            </div><!-- End .accordion -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
    @include('front.partials._quote')
</main><!-- End .main -->

@endsection

@section('script')

<script src="{{ URL::asset('assets/js/nouislider.min.js') }}"></script>

@endsection
