@extends('welcome')

@section('title')
    {{ isset($page_title) ? $page_title : 'Packaging Expert' }}
@endsection

@section('keywords')
    {{ isset($page_keywords) ? $page_keywords : 'Packaging Expert' }}
@endsection

@section('description')
    {{ isset($page_description) ? $page_description : 'Packaging Expert' }}
@endsection

@section('style')

<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider/nouislider.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

@endsection

@section('content')

<main class="main">
	<div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title">{{ $category_title }}<span style="color: #0A72E8 !important;">{{ $main_category_title }}</span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $main_category_title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category_title }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
        	<div class="row">
        		<div class="col-lg-9">
        			<div class="toolbox">
        				<div class="toolbox-left">
        					<div class="toolbox-info">
        						Showing <span>{{ $total_products_of_category }} of {{ $total_products_of_category }}</span> Products
        					</div><!-- End .toolbox-info -->
        				</div><!-- End .toolbox-left -->

        				<div class="toolbox-right">
        				<!--	<div class="toolbox-sort">
        						<label for="sortby">Sort by:</label>
        						<div class="select-custom">
									<select name="sortby" id="sortby" class="form-control">
										<option value="popularity" selected="selected">Most Popular</option>
										<option value="rating">Most Rated</option>
										<option value="date">Date</option>
									</select>
								</div>
        					</div> -->
        				</div><!-- End .toolbox-right -->
        			</div><!-- End .toolbox -->

                    <div class="mb-3">
                        @if(!$products->isEmpty())
                        <div class="row">
                            @foreach($products as $data)    
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.show', $data->slug) }}">
                                            @foreach($data->product as $key => $image)
                                                @if($key == 0)
                                                <img src="{{ URL::asset('admin/app-assets/images/products/'.$image->image_medium) }}" alt="{{ $data->title }} image" class="product-image">
                                                @endif
                                            @endforeach
                                        </a>
                                        <div class="product-action">
                                            <a href="{{ route('product.show', $data->slug) }}" class="btn-product"><span>View Details</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                       <!-- <div class="product-cat">
                                            <a href="#">{{ $data->category->title }}</a>
                                        </div> --><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{ route('product.show', $data->slug) }}">{{ $data->title }}</a></h3><!-- End .product-title -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 -->
                            @endforeach
                        </div><!-- End .row -->
                        @else
                        <div class="row justify-content-left">
                            <div class="col-12 col-md-12 col-lg-12">
                                There are no products to show here...
                            </div>
                        </div>
                        @endif
                    </div><!-- End .products -->

        		<!--	<nav aria-label="Page navigation">
					    <ul class="pagination justify-content-center">
					        <li class="page-item disabled">
					            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
					                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
					            </a>
					        </li>
					        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
					        <li class="page-item"><a class="page-link" href="#">2</a></li>
					        <li class="page-item"><a class="page-link" href="#">3</a></li>
					        <li class="page-item-total">of 6</li>
					        <li class="page-item">
					            <a class="page-link page-link-next" href="#" aria-label="Next">
					                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
					            </a>
					        </li>
					    </ul>
					</nav> -->
        		</div><!-- End .col-lg-9 -->
        		<aside class="col-lg-3 col-3">
        			<div class="sidebar sidebar-shop">
        				<div class="widget widget-clean">
        					<label>Filters:</label>
        					<a href="#" class="sidebar-filter-clear">Clean All</a>
        				</div><!-- End .widget widget-clean -->

        				<div class="widget widget-collapsible">
							<h3 class="widget-title">
							    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
							        {{ $main_category_title }}
							    </a>
							</h3><!-- End .widget-title -->

							<div class="collapse show" id="widget-1">
								<div class="widget-body">
									<div class="filter-items filter-items-count">
										@foreach($other_categories as $key => $category)
                                        <div class="filter-item">
                                            @if($main_category_id == 1)
                                            <a href="{{ route('industry-boxes.category.index', $category->slug) }}">
                                            @elseif($main_category_id == 2)
                                            <a href="{{ route('style-boxes.category.index', $category->slug) }}">
                                            @else
                                            <a href="{{ route('other-products.category.index', $category->slug) }}">
                                            @endif    
											<div class="custom-control custom-checkbox">
											<!--	<input type="checkbox" class="custom-control-input filter_cat" id="cat-{{ $key + 1 }}" value="{{ $category->id }}"> -->
												<label class="custom-control-label" for="cat-{{ $key + 1 }}">{{ $category->title }}</label>
											</div><!-- End .custom-checkbox -->
											</a>
                                            <span class="item-count">{{ $category->total_products }}</span>
										</div><!-- End .filter-item -->
									    @endforeach
                                    </div><!-- End .filter-items -->
								</div><!-- End .widget-body -->
							</div><!-- End .collapse -->
						</div><!-- End .widget -->
        			</div><!-- End .sidebar sidebar-shop -->
        		</aside><!-- End .col-lg-3 -->
        	</div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
    @include('front.partials._quote')
</main><!-- End .main -->

@endsection

@section('script')

<script src="{{ URL::asset('assets/js/nouislider.min.js') }}"></script>

@endsection
