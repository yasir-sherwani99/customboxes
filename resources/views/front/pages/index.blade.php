@extends('welcome')

@section('title')
    {{ isset($general->page_title) ? $general->page_title : 'Packaging Expert' }}
@endsection

@section('keywords')
    {{ isset($general->page_keywords) ? $general->page_keywords : 'Packaging Expert' }}
@endsection

@section('description')
    {{ isset($general->page_description) ? $general->page_description : 'Packaging Expert' }}
@endsection

@section('style')

    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jquery.countdown.css') }}"> 

    <script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

    <script>

    	$(document).ready(function() {
            $(".btn-quickview").click(function() {
    			$(".quickView-container").show();
    		});
    	});

        $(function() {

            $('.subscriber').submit(function(e) { // catching form submit
                e.preventDefault(); // preventing usual submit
                var form = $(this).serialize();
                $.ajax({
                    url: '/subscribers',
                    type: 'POST',
                    dataType: 'json',
                    data: form, 
                    success: function( result ) {
                        alert(result.success); 
                      //  window.location.href = '/subscriber/confirmed';  
                    },
                    error: function (request, status, error) {
                        json = $.parseJSON(request.responseText);
                        $.each(json.errors, function(key, value){
                           // $('.alert-danger').show();
                           // $('.alert-danger').append('<p>'+value+'</p>');
                           alert('This email has already been registered as subscriber.');
                        });
                    }
                });
            });

        });

    </script>
    <style>

        .intro-slider {
            width: 100% !important;
            height: auto !important;
            overflow: hidden;
        }
        .btn-outline-primary-2 {
            border: 1px solid #0A72E8 !important;
            color: #0A72E8 !important;
        }
        .btn-outline-primary-2:hover {
            background-color: #0A72E8 !important;
            color: #ffffff !important;
        }
        .btn-cart {
            border: 1px solid #0A72E8 !important;
            color: #4267b2 !important;
        }
        .btn-cart:hover {
            background-color: #0A72E8 !important;
            color: #ffffff !important;   
        }
        .banner-link:hover {
            border-color: #0A72E8 !important;
            background-color: #0A72E8 !important;
            color: #ffffff !important;   
        }
        .btn-outline-white:hover {
            border-color: #0A72E8 !important;
            background-color: #0A72E8 !important;
        }

    </style>

@endsection

@section('content')

	<main class="main">
        <div class="intro-slider-container">
            <div class="owl-carousel owl-theme owl-nav-inside owl-light owl-loaded" data-toggle="owl" data-owl-options='{
                    "dots": true,
                    "nav": true,
                    "loop": true,
                    "autoplay": true,
                    "autoplayTimeout": 5000, 
                    "responsiveClass": true,
                    "responsive": {
                        "0": {
                            "items" : 1,
                            "nav": true
                        },
                        "600": {
                            "items" : 1,
                            "nav": true
                        },
                        "992": {
                            "items" : 1,
                            "nav": true
                        }
                    }
                }'>
                @foreach($sliders as $key => $slider)
            <!--    <div class="intro-slide">  -->
                    <div class="item">
                        <img src="{{ URL::asset('admin/app-assets/images/slider/'.$slider->image) }}">
                    </div>
                  <!--  <div class="container intro-content text-center">
                        <h3 class="intro-subtitle text-white">You're Looking Good</h3>
                        <h1 class="intro-title text-white">New Lookbook</h1>

                        <a href="category.html" class="btn btn-outline-white-4">
                            <span>Discover More</span>
                        </a>
                    </div> --><!-- End .intro-content -->
            <!--    </div> --><!-- End .intro-slide -->
                @endforeach
            </div><!-- End .intro-slider owl-carousel owl-theme -->

            <span class="slider-loader"></span><!-- End .slider-loader -->
        </div><!-- End .intro-slider-container -->
        
        <div class="bg-light-2 pt-6 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <h3 class="heading-title text-left" style="font-weight: 600;">{{ $general->home_page_heading }}</h3><!-- End .title -->
                        <p class="lead mb-3" style="color: #000000; font-weight: 600;">{{ $general->home_page_sub_heading }}</p><!-- End .lead text-primary -->
                        <p class="mb-2 text-justify" style="color: #000000; font-family: Verdana;">
                            {{ $general->home_page_description }}
                        </p>

                        <a href="{{ route('about.index') }}" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                            <span>READ MORE</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-lg-5 -->

                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-images">
                          <!--  <img src="{{ URL::asset('assets/images/about/images_about_1.jpg') }}" alt="" class="about-img-front">
                            <img src="{{ URL::asset('assets/images/about/images_about_2.jpg') }}" alt="" class="about-img-back"> -->
                            <img src="{{ URL::asset('assets/images/about/imageedit_1.png') }}" class="img-fluid">
                        </div><!-- End .about-images -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .bg-light-2 pt-6 pb-6 -->

        <div class="mb-6 mb-lg-8"></div>

        <section class="best-sellers">
            <div class="container">
            <!--	<hr class="mb-4"> -->
                <div class="heading">
                    <p class="heading-cat">category</p>
                    <h3 class="heading-title" style="font-weight: 600;">Industry Boxes</h3>
                </div> 
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow text-center" data-toggle="owl" 
                data-owl-options='{
                    "nav": true, 
                    "dots": false,
                    "margin": 30,
                    "loop": true,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":3
                        },
                        "1200": {
                            "items":4
                        }
                    }
                }'>
                	@foreach($industry_boxes as $industry)
                    <div class="product product-10 text-center border">
                        <figure class="product-media">
                            <a href="{{ route('industry-boxes.category.index', $industry->slug) }}">
                            	@foreach($industry->category as $key => $image)
                            	@if($key == 0)
                                <img src="{{ URL::asset('admin/app-assets/images/categories/'.$image->image) }}" alt="Industry boxes category image" class="product-image">
                                @endif
                                @endforeach
                                <!--
                                <img src="assets/images/demos/demo-24/best-sellers/product-1-2.jpg" alt="Product image" class="product-image-hover"> -->
                            </a>

                         <!--   <div class="product-action-vertical">
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div> --><!-- End .product-action-vertical -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-action">
                                <a href="{{ route('industry-boxes.category.index', $industry->slug) }}" class="btn-cart"><span>View Details</span></a>
                              <!--  <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a> -->
                            </div><!-- End .product-action -->
                            <div class="product-intro">
                                <h3 class="product-title">
                                    <a href="{{ route('category.all.index', 'industry-boxes') }}">Industry Boxes</a>
                                </h3> <!-- End .product-title -->
                                <div class="product-price">
                                    {{ $industry->title }}
                                </div><!-- End .product-price -->
                            </div>
                            <div class="product-detail">
                                
                            </div>
                        </div><!-- End .product-body -->
                    </div><!-- End .product --> 
                    @endforeach
                </div>
            </div>
        </section>

        <section class="best-sellers">
            <div class="container">
            <!--    <hr class="mb-4"> -->
                <div class="heading">
                    <p class="heading-cat">category</p>
                    <h3 class="heading-title" style="font-weight: 600;">Style Boxes</h3>
                </div> 
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow text-center" data-toggle="owl" 
                data-owl-options='{
                    "nav": true, 
                    "dots": false,
                    "margin": 30,
                    "loop": true,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":3
                        },
                        "1200": {
                            "items":4
                        }
                    }
                }'>
                    @foreach($style_boxes as $style)
                    <div class="product product-10 text-center border">
                        <figure class="product-media">
                            <a href="{{ route('style-boxes.category.index', $style->slug) }}">
                                @foreach($style->category as $key => $image)
                                @if($key == 0)
                                <img src="{{ URL::asset('admin/app-assets/images/categories/'.$image->image) }}" alt="Style boxes category image" class="product-image">
                                @endif
                                @endforeach
                                <!--
                                <img src="assets/images/demos/demo-24/best-sellers/product-1-2.jpg" alt="Product image" class="product-image-hover"> -->
                            </a>

                         <!--   <div class="product-action-vertical">
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div> --><!-- End .product-action-vertical -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-action">
                                <a href="{{ route('style-boxes.category.index', $style->slug) }}" class="btn-cart"><span>View Details</span></a>
                              <!--  <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a> -->
                            </div><!-- End .product-action -->
                            <div class="product-intro">
                                <h3 class="product-title">
                                    <a href="{{ route('category.all.index', 'box-styles') }}">Style Boxes</a>
                                </h3> <!-- End .product-title -->
                                <div class="product-price">
                                    {{ $style->title }}
                                </div><!-- End .product-price -->
                            </div>
                            <div class="product-detail">
                                
                            </div>
                        </div><!-- End .product-body -->
                    </div><!-- End .product --> 
                    @endforeach
                </div>
            </div>
        </section>

        <section class="best-sellers">
            <div class="container">
            <!--    <hr class="mb-4"> -->
                <div class="heading">
                    <p class="heading-cat">category</p>
                    <h3 class="heading-title" style="font-weight: 600;">Other Products</h3>
                </div> 
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow text-center" data-toggle="owl" 
                data-owl-options='{
                    "nav": true, 
                    "dots": false,
                    "margin": 30,
                    "loop": true,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":3
                        },
                        "1200": {
                            "items":4
                        }
                    }
                }'>
                    @foreach($other_products as $other)
                    <div class="product product-10 text-center border">
                        <figure class="product-media">
                            <a href="{{ route('other-products.category.index', $other->slug) }}">
                                @foreach($other->category as $key => $image)
                                @if($key == 0)
                                <img src="{{ URL::asset('admin/app-assets/images/categories/'.$image->image) }}" alt="Style boxes category image" class="product-image">
                                @endif
                                @endforeach
                                <!--
                                <img src="assets/images/demos/demo-24/best-sellers/product-1-2.jpg" alt="Product image" class="product-image-hover"> -->
                            </a>

                         <!--   <div class="product-action-vertical">
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div> --><!-- End .product-action-vertical -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-action">
                                <a href="{{ route('other-products.category.index', $other->slug) }}" class="btn-cart"><span>View Details</span></a>
                              <!--  <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a> -->
                            </div><!-- End .product-action -->
                            <div class="product-intro">
                                <h3 class="product-title">
                                    <a href="{{ route('category.all.index', 'other-products') }}">Other Products</a>
                                </h3> <!-- End .product-title -->
                                <div class="product-price">
                                    {{ $other->title }}
                                </div><!-- End .product-price -->
                            </div>
                            <div class="product-detail">
                                
                            </div>
                        </div><!-- End .product-body -->
                    </div><!-- End .product --> 
                    @endforeach
                </div>
            </div>
        </section>

        <div class="mb-6 mb-lg-8"></div>

        <section class="banner-group pt-10 pb-6 bg-light-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-5">
                        <div class="banner banner-display banner-link-anim">
                            <a href="#">
                                <img src="{{ URL::asset('admin/app-assets/images/banners/'.$general->home_page_banner_1) }}" alt="Banner">
                            </a> 

                            <div class="banner-content banner-content-center">
                               <!-- <h4 class="banner-subtitle text-yellow">Trending</h4> --><!-- End .banner-subtitle -->
                              <!--  <h3 class="banner-title text-secondary">Custom Cosmetic Boxes</h3> --><!-- End .banner-title -->
                              <!--  <div class="banner-text">from $19.99</div> --><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-5 -->

                    <div class="col-md-6 col-lg-3">
                        <div class="banner banner-display banner-link-anim">
                            <a href="#">
                                <img src="{{ URL::asset('admin/app-assets/images/banners/'.$general->home_page_banner_2) }}" alt="Banner">
                            </a> 

                            <div class="banner-content banner-content-center">
                               <!-- <h4 class="banner-subtitle text-grey">Industry</h4> --><!-- End .banner-subtitle -->
                                <!-- <h3 class="banner-title text-dark">Custom Metalized<br>Boxes</h3> --><!-- End .banner-title -->
                            <!--    <div class="banner-text text-white">from $39.99</div> --><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-md-6 col-lg-4">
                        <div class="banner banner-display banner-link-anim">
                            <a href="#">
                                <img src="{{ URL::asset('admin/app-assets/images/banners/'.$general->home_page_banner_3) }}" alt="Banner">
                            </a> 

                            <div class="banner-content banner-content-center">
                                <!-- <h4 class="banner-subtitle text-grey">New Arrivals</h4> --><!-- End .banner-subtitle -->
                            <!--    <h3 class="banner-title text-white">Food & Beverage <br>Boxes</h3> --><!-- End .banner-title -->
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->

                        <div class="banner banner-display banner-link-anim">
                            <a href="#">
                                <img src="{{ URL::asset('admin/app-assets/images/banners/'.$general->home_page_banner_4) }}" alt="Banner">
                            </a> 

                            <div class="banner-content banner-content-center">
                              <!--  <h4 class="banner-subtitle">New Arrivals</h4> --><!-- End .banner-subtitle -->
                              <!--  <h3 class="banner-title">Custom Gift Boxes</h3> --><!-- End .banner-title -->
                             <!--   <div class="banner-text">up to 30% off</div> --><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </section>

        <!--
        <section class="video-banner">
            <img src="assets/images/demos/demo-24/video-banner/banner.jpg" alt="Video Banner">

            <div class="intro video">
                <div class="title">
                    <h3><i>Spring / Summer</i></h3>
                </div>
                <div class="content">
                    <h4>New & Stylish<br>Collection 2019</h4>
                </div>
                <div class="action">
                    <a href="https://www.youtube.com/watch?v=YbJOTdZBX1g" class="btn-iframe"><i class="icon-play"></i></a>
                </div>
            </div>
        </section> -->

        <section class="subscribe">
            <div class="container">
                <div class="heading">
                    <p class="heading-cat">Get The Latest News & Deals</p>
                    <h3 class="heading-title" style="font-weight: 600;">Subscribe</h3>
                </div>
                <div class="col-lg-6 subscribe-form">
                    <form class="subscriber">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="email" name="email" placeholder="Enter your Email Address" aria-label="Email Adress" required="">
                            <div class="input-group-append">
                                <button class="btn btn-subscribe" type="submit"><span>Subscribe</span></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- .End .input-group -->
                    </form>
                </div>
            </div>
        </section>
        
        <section class="blog mb-6 p-4 pb-4" style="background-color: #fafafa;">
            <div class="container">
                <div class="heading">
                    <p class="heading-cat">Our Fresh News</p>
                    <h3 class="heading-title" style="font-weight: 600;">New Blog Posts</h3>
                </div>
                <div class="owl-carousel owl-simple mb-4" data-toggle="owl" 
                    data-owl-options='{
                        "nav": true, 
                        "dots": false,
                        "items": 3,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":1,
                                "dots":true
                            },
                            "520": {
                                "items":2,
                                "dots":true
                            },
                            "768": {
                                "items":3
                            }
                        }
                    }'>
                    @foreach($blogs as $blog)
                    <article class="entry">
                        <figure class="entry-media">
                            <a href="{{ route('blog.show', $blog->id) }}">
                                <img src="{{ URL::asset('admin/app-assets/images/blogs/'.$blog->image) }}" class="img-fluid" alt="post image">
                            </a>
                        </figure><!-- End .entry-media -->
                        @php
                            $created = $blog->created_at;
                            $created_at = \Carbon\Carbon::parse($created);
                            $post_date = $created_at->toFormattedDateString();
                        @endphp
                        <div class="entry-body text-center">
                            <div class="entry-meta">
                                <a href="#">{{ $post_date }}</a>
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title" style="font-weight: 500;">
                                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <a href="{{ route('blog.show', $blog->slug) }}" class="read-more">read more</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                    @endforeach
                </div><!-- End .owl-carousel -->
                <div class="text-center">
                    <div class="action">
                        <a href="{{ route('blog.index') }}" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                            <span>Show All</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        @include('front.partials._quote')
    </main>

@endsection

@section('script')

	<script src="{{ URL::asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/demos/demo-24.js') }}"></script>

@endsection


