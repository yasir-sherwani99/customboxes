@extends('welcome')

@section('style')

    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jquery.countdown.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('assets/css/skins/skin-demo-24.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/demos/demo-24.css') }}">

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

@endsection

@section('content')

		<main class="main">
        <!--    <section class="logos">
                <div class="container">
                    <hr class="mb-4">
                    <div class="heading">
                        <h5 class="heading-cat">trending brands</h5>
                    </div>
                    <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": true, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
                        <a href="#" class="brand">
                            <img src="assets/images/demos/demo-24/brands/1.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/demos/demo-24/brands/2.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/demos/demo-24/brands/3.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/demos/demo-24/brands/4.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/demos/demo-24/brands/5.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/demos/demo-24/brands/6.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/demos/demo-24/brands/1.png" alt="Brand Name">
                        </a>
                    </div>
                </div>  
            </section> --><!-- End .container -->

        <!--    <section class="banners center">
                <div class="container">
                	<hr class="mb-4">
                    <div class="row">
                        <div class="banner col-lg-4 col-md-6 col-sm-6">
                            <img src="assets/images/demos/demo-24/banners/banner-1.jpg" alt="Banner 1">
                            <div class="intro">
                                <div class="title">
                                    <h3>Online mega deal</h3>
                                </div>
                                <div class="content">
                                    <h4>Camping Gear<br>& Accessories</h4>
                                </div>
                                <div class="action">
                                    <a href="category.html">Shop Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="banner percent col-lg-4 col-md-6 col-sm-6">
                            <img src="assets/images/demos/demo-24/banners/banner-2.jpg" alt="Banner 2">
                            <div class="intro">
                                <div class="title">
                                    <h3>Summer</h3>
                                    <h4>Clearance</h4>
                                </div>
                                <div class="img-percent">
                                    <img src="assets/images/demos/demo-24/banners/percent.png" width="190" height="75" alt="Percent">
                                </div>
                                <div class="content">
                                    <h4>* Donec sit amet vulputate<br> velit.Aenean tempus nisl</h4>
                                </div>
                                <div class="action">
                                    <a href="category.html">Discover Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="banner col-lg-4  col-md-6 col-sm-6">
                            <img src="assets/images/demos/demo-24/banners/banner-3.jpg" alt="Banner 3">
                            <div class="intro">
                                <div class="title">
                                    <h3>Lightning Deals</h3>
                                </div>
                                <div class="content">
                                    <h4>Sports &<br>Outdoors</h4>
                                </div>
                                <div class="action">
                                    <a href="category.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

            <section class="best-sellers">
                <div class="container">
                <!--	<hr class="mb-4"> -->
                    <div class="heading">
                        <p class="heading-cat">favourite from every category</p>
                        <h3 class="heading-title">Our Products</h3>
                    </div>
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow text-center" data-toggle="owl" 
                    data-owl-options='{
                        "nav": true, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
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
                    	@foreach($products as $product)
                        <div class="product product-10 text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.show', $product->id) }}">
                                	@foreach($product->product as $key => $image)
                                	@if($key == 0)
                                    <img src="{{ URL::asset('admin/app-assets/images/products/'.$image->image_medium) }}" alt="Product image" class="product-image">
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
                                    <a href="{{ route('product.show', $product->id) }}" class="btn-cart"><span>View Details</span></a>
                                  <!--  <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a> -->
                                </div><!-- End .product-action -->
                                <div class="product-intro">
                                    <h3 class="product-title">
                                        <a href="{{ route('category.index', $product->category->id) }}">{{ $product->category->title }}</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{ $product->title }}
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

            <section class="banners stretch mt-2">
                <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 banner-lg" style="background-color: #000000;">
                      <!--  <img src="assets/images/demos/demo-24/banners/banner-4.jpg" alt="Banner 4"> -->
                        <div class="intro">
                            <div class="title">
                                <h3><i>Trending</i></h3>
                            </div>
                            <div class="content">
                                <h4>Custom Cosmetic Boxes</h4>
                              <!--  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.<br>Donec odio. Quisque volutpat mattis eros.</p> -->
                            </div>
                            <div class="action">
                                <a href="{{ route('category.index', 12) }}">Discover Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 banner-sm-div">
                        <div class="col-lg-6 col-md-6 col-sm-6 banner-sm font-black" style="background-color: #CFD8DC;">
                          <!--  <img src="assets/images/demos/demo-24/banners/banner-5.jpg" alt="Banner 5"> -->
                            <div class="intro">
                                <div class="title">
                                    <h3>Industry</h3>
                                </div>
                                <div class="content">
                                    <h4>Custom Metalized<br> Boxes</h4>
                                </div>
                                <div class="action">
                                    <a href="{{ route('category.index', 15) }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 banner-sm font-white" style="background-color: #000000; width: auto; height: 300px;">
                          <!--  <img src="assets/images/demos/demo-24/banners/banner-6.jpg" alt="Banner 6"> -->
                            <div class="intro">
                                <div class="title">
                                    <h3>New Arrivals</h3>
                                </div>
                                <div class="content">
                                    <h4>Food & Beverage<br> Boxes</h4>
                                </div>
                                <div class="action">
                                    <a href="{{ route('category.index', 18) }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 banner-sm font-white" style="background-color: #78909C;">
                          <!--  <img src="assets/images/demos/demo-24/banners/banner-7.jpg" alt="Banner 7"> -->
                            <div class="intro">
                                <div class="title">
                                    <h3>Industry</h3>
                                </div>
                                <div class="content">
                                    <h4>Custom Retail<br> Boxes</h4>
                                </div>
                                <div class="action">
                                    <a href="{{ route('category.index', 13) }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 banner-sm font-black" style="background-color: #F1F1F1; width: auto; height: 300px;">
                           <!-- <img src="assets/images/demos/demo-24/banners/banner-8.jpg" alt="Banner 8"> -->
                            <div class="intro">
                                <div class="title">
                                    <h3>Industry</h3>
                                </div>
                                <div class="content">
                                    <h4>Custom Gift<br> Boxes</h4>
                                </div>
                                <div class="action">
                                    <a href="{{ route('category.index', 14) }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>

            <section class="featured-products">
                <div class="container">
                    <div class="heading">
                        <p class="heading-cat">Category </p>
                        <h3 class="heading-title">Style Boxes</h3>
                    </div>
                    @foreach($style_boxes->chunk(4) as $chunk)
                    <div class="row">
                        @foreach($chunk as $style)
                        <div class="col-3">
                            <div class="product product-10 text-center">
                                <figure class="product-media">
                                    <a href="product.html">
                                    	@foreach($style->category as $key => $image)
                                    	@if($key == 0)
                                        <img src="{{ URL::asset('admin/app-assets/images/categories/'.$image->image) }}" alt="Industry boxes category image" class="product-image">
                                        @endif
                                        @endforeach
                                     <!--   <img src="assets/images/demos/demo-24/featured-products/product-1-2.jpg" alt="Product image" class="product-image-hover"> -->
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">

                                    <div class="product-action">
                                        <a href="{{ route('category.index', $style->id) }}" class="btn-cart"><span>View Details</span></a>
                                      <!--  <a href="#" class="btn-product-icon btn-wishlist"><span>Add to Wishlist</span></a> -->
                                    </div><!-- End .product-action -->
                                    <div class="product-intro">
                                        <h3 class="product-title">
                                            <a href="{{ route('category.all.index', 2) }}">Style Boxes</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{ $style->title }}
                                        </div><!-- End .product-price -->
                                    </div>
                                    <div class="product-detail">
                                       
                                    </div>
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    <div class="row">
                    	<div class="col-12 text-center">
                    		<div class="action">
                    			<a href="{{ route('category.all.index', 2) }}">Show all</a>
                    		</div>
                    	</div>
                    </div>
                </div>
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
                        <h3 class="heading-title">Stay In The Know</h3>
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

            <section class="blog mb-6">
                <div class="container">
                    <div class="heading">
                        <p class="heading-cat">Our Fresh News</p>
                        <h3 class="heading-title">New Blog Posts</h3>
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
                                    <img src="{{ URL::asset('admin/app-assets/images/blogs/'.$blog->image) }}" style="width: 376px; height: 250px;" alt="post image">
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

                                <h3 class="entry-title">
                                    <a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a>
                                </h3><!-- End .entry-title -->

                                <div class="entry-content">
                                    <a href="{{ route('blog.show', $blog->id) }}" class="read-more">read more</a>
                                </div><!-- End .entry-content -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                    <div class="text-center">
                        <div class="action">
                            <a href="{{ route('blog.index') }}">Show All</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

@endsection

@section('script')

	<script src="{{ URL::asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/demos/demo-24.js') }}"></script>

@endsection


