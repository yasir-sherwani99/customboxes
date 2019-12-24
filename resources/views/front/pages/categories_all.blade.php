@extends('welcome')

@section('style')

<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider/nouislider.css') }}">

<style>

.pagination {
   justify-content: center;
}

</style>

@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">{{ $main_category_title }}<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav breadcrumb-with-filter">
        <div class="container">
          <!--  <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a> -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $main_category_title }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="categories-page">
            <div class="container">
                @foreach($categories->chunk(4) as $chunk)
                <div class="row">
                    @foreach($chunk as $category)
                    <div class="col-sm-6 col-md-3">
                        <div class="banner banner-cat banner-badge">
                            @foreach($category->category as $key => $image)
                                @if($key == 0)
                                <a href="{{ route('category.index', $category->id) }}">
                                    <img src="{{ URL::asset('admin/app-assets/images/categories/'.$image->image) }}" alt="{{ $category->title }} image">
                                </a>
                                @endif
                            @endforeach    
                            <a class="banner-link" href="{{ route('category.index', $category->id) }}">
                                <h3 class="banner-title">{{ $category->title }}</h3><!-- End .banner-title -->
                                <h4 class="banner-subtitle">{{ $category->total_products }} Products</h4><!-- End .banner-subtitle -->
                                <span class="banner-link-text">Shop Now</span>
                            </a><!-- End .banner-link -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-3 -->
                    @endforeach
                </div><!-- End .row -->
                @endforeach
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div><!-- End .container -->
        </div><!-- End .categories-page -->
        
        <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
        <aside class="sidebar-shop sidebar-filter sidebar-filter-banner">
            <div class="sidebar-filter-wrapper">
                <div class="widget widget-clean">
                    <label><i class="icon-close"></i>Filters</label>
                    <a href="#" class="sidebar-filter-clear">Clean All</a>
                </div>
                <div class="widget">
                    <h3 class="widget-title">
                        Browse Category
                    </h3><!-- End .widget-title -->

                    <div class="widget-body">
                        <div class="filter-items filter-items-count">
                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cat-1">
                                    <label class="custom-control-label" for="cat-1">Women</label>
                                </div><!-- End .custom-checkbox -->
                                <span class="item-count">3</span>
                            </div><!-- End .filter-item -->

                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cat-2">
                                    <label class="custom-control-label" for="cat-2">Men</label>
                                </div><!-- End .custom-checkbox -->
                                <span class="item-count">0</span>
                            </div><!-- End .filter-item -->

                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cat-3">
                                    <label class="custom-control-label" for="cat-3">Holiday Shop</label>
                                </div><!-- End .custom-checkbox -->
                                <span class="item-count">0</span>
                            </div><!-- End .filter-item -->

                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cat-4">
                                    <label class="custom-control-label" for="cat-4">Gifts</label>
                                </div><!-- End .custom-checkbox -->
                                <span class="item-count">0</span>
                            </div><!-- End .filter-item -->

                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cat-5">
                                    <label class="custom-control-label" for="cat-5">Homeware</label>
                                </div><!-- End .custom-checkbox -->
                                <span class="item-count">0</span>
                            </div><!-- End .filter-item -->

                            <div class="filter-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cat-6" checked="checked">
                                    <label class="custom-control-label" for="cat-6">Grid Categories Fullwidth</label>
                                </div><!-- End .custom-checkbox -->
                                <span class="item-count">13</span>
                            </div><!-- End .filter-item -->

                            <div class="sub-filter-items">
                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-7">
                                        <label class="custom-control-label" for="cat-7">Dresses</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">3</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-8">
                                        <label class="custom-control-label" for="cat-8">T-shirts</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">0</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-9">
                                        <label class="custom-control-label" for="cat-9">Bags</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">4</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-10">
                                        <label class="custom-control-label" for="cat-10">Jackets</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">2</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-11">
                                        <label class="custom-control-label" for="cat-11">Shoes</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">2</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-12">
                                        <label class="custom-control-label" for="cat-12">Jumpers</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">1</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-13">
                                        <label class="custom-control-label" for="cat-13">Jeans</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">1</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-14">
                                        <label class="custom-control-label" for="cat-14">Sportwear</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">0</span>
                                </div><!-- End .filter-item -->
                            </div><!-- End .sub-filter-items -->
                        </div><!-- End .filter-items -->
                    </div><!-- End .widget-body -->
                </div><!-- End .widget -->
            </div><!-- End .sidebar-filter-wrapper -->
        </aside><!-- End .sidebar-filter -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection

@section('script')

<script src="{{ URL::asset('assets/js/nouislider.min.js') }}"></script>

@endsection
