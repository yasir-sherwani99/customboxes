@extends('welcome')

@section('style')

<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider/nouislider.css') }}">

@endsection

@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $product->category->title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
            </ol>

        <!--    <nav class="product-pager ml-auto" aria-label="Product">
                <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                    <i class="icon-angle-left"></i>
                    <span>Prev</span>
                </a>

                <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                    <span>Next</span>
                    <i class="icon-angle-right"></i>
                </a>
            </nav> --><!-- End .pager-nav -->
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                @php
                                  $sorted = $product->product->sortBy('id', SORT_REGULAR, false); 
                                @endphp
                                <figure class="product-main-image">
                                    @foreach($sorted as $key => $image)
                                        @if($key == 0)
                                        <img id="product-zoom" src="{{ URL::asset('admin/app-assets/images/products/'.$image->image_medium) }}" data-zoom-image="{{ URL::asset('admin/app-assets/images/products/'.$image->image_big) }}" alt="product image">
                                        @endif
                                    @endforeach
                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->
    
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @foreach($sorted as $key => $image)
                                        <a class="product-gallery-item {{ $key == 0 ? 'active' : '' }}" href="#" data-image="{{ URL::asset('admin/app-assets/images/products/'.$image->image_medium) }}" data-zoom-image="{{ URL::asset('admin/app-assets/images/products/'.$image->image_big) }}" style="max-height: 107px !important;">
                                            <img src="{{ URL::asset('admin/app-assets/images/products/'.$image->image_small) }}" alt="product cross">
                                        </a>
                                    @endforeach

                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $product->title }}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 5 Reviews )</a>
                            </div><!-- End .rating-container -->

                          <!--  <div class="product-price">
                                $84.00
                            </div> --><!-- End .product-price -->

                            <div class="product-content">
                                <p>{!! $product->description !!}</p>
                            </div><!-- End .product-content -->

                            <div class="product-details-action">
                                <a href="#" class="btn-product btn-cart"><span>Request a Quote</span></a>
                            </div><!-- End .product-details-action -->

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="#">{{ $product->category->title }}</a>
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Specification</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            {!! $product->description !!}
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <table class="table table-sm table-striped">
                                <tbody>
                                <tr>
                                    <td style="width: 20%;" class="pl-4"><h6>Dimensions</h6></td>
                                    <td style="width: 80%;"><h6>{{ isset($product->product_specification->dimensions) ? $product->product_specification->dimensions : 'Not available...' }}</h6></td>
                                </tr>
                                <tr>
                                    <td class="pl-4"><h6>Printing</h6></td>
                                    <td><h6>{{ isset($product->product_specification->printing) ? $product->product_specification->printing : 'Not available...' }}</h6></td>
                                </tr>
                                <tr>
                                    <td class="pl-4"><h6>Paper Stock</h6></td>
                                    <td><h6>{{ isset($product->product_specification->paper_stock) ? $product->product_specification->paper_stock : 'Not available...' }}</h6></td>
                                </tr>
                                <tr>
                                    <td class="pl-4"><h6>Quantities</h6></td>
                                    <td><h6>{{ isset($product->product_specification->quantities) ? $product_specification->quantities : 'Not available...' }}</h6></td>
                                </tr>
                                <tr>
                                    <td class="pl-4"><h6>Coating</h6></td>
                                    <td><h6>{{ isset($product->product_specification->coating) ? $product->product_specification->coating : 'Not available...' }}</h6></td>
                                </tr>
                                <tr>
                                    <td class="pl-4"><h6>Default Process</h6></td>
                                    <td><h6>{{ isset($product->product_specification->default_process) ? $product->product_specification->default_process : 'Not available...' }}</h6></td>
                                </tr>
                                <tr>
                                    <td class="pl-4"><h6>Options</h6></td>
                                    <td><h6>{{ isset($product->product_specification->options) ? $product->product_specification->options : 'Not available...' }}</h6></td>
                                </tr>
                                <tr>
                                    <td class="pl-4"><h6>Proof</h6></td>
                                    <td><h6>{{ isset($product->product_specification->proof) ? $product->product_specification->proof : 'Not available...' }}</h6></td>
                                </tr>
                                <tr>
                                    <td class="pl-4"><h6>Turn Around Time</h6></td>
                                    <td><h6>{{ isset($product->product_specification->turn_around_time) ? $product->product_specification->turn_around_time : 'Not available...' }}</h6></td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                @foreach($other_products as $product)
                <div class="product product-7 text-center">
                    <figure class="product-media">
                       <!-- <span class="product-label label-new">New</span> -->
                        <a href="{{ route('product.show', $product->id) }}">
                            @foreach($product->product as $key => $image)
                            @if($key == 0)
                            <img src="{{ URL::asset('admin/app-assets/images/products/'.$image->image_medium) }}" alt="{{ $product->title }} image" class="product-image">
                            @endif
                            @endforeach
                        </a>

                        <div class="product-action">
                            <a href="{{ route('product.show', $product->id) }}" class="btn-product"><span>View Details</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">{{ $product->category->title }}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                        <!--    $60.00  -->
                        </div><!-- End .product-price -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @endforeach
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
        
@endsection

@section('script')

<script src="{{ URL::asset('assets/js/jquery.elevateZoom.min.js') }}"></script>

@endsection