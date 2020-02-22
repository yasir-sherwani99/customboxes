                <div class="header-middle header-bottom border-top border-bottom sticky-header">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars" style="color: #000000 !important;"></i>
                        </button>

                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ URL::asset('assets/images/logos/Logo-WS-2.png') }}" alt="PackagingXpert Logo" class="img-fluid">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="{{ request()->path() == '/' ? 'active' : '' }}">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                @php

                                    $industries = \App\Category::where('main_category', 1)
                                                         ->orderBy('title', 'ASC')
                                                         ->limit(7)
                                                         ->get();

                                @endphp
                                <li class="{{ request()->routeIs('industry-boxes.category.index') || request()->path() == 'main/industry-boxes' ? 'active' : '' }}">
                                    <a href="{{ route('category.all.index', 'industry-boxes') }}" class="sf-with-ul" style="padding-right: 25px;">Industry Boxes</a>
                                    <div class="megamenu megamenu-sm">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <div class="menu-col">
                                                    <div class="menu-title">Categories</div><!-- End .menu-title -->
                                                    <ul>
                                                        @foreach($industries as $industry)
                                                        <li class="{{ request()->path() == 'industry-boxes/'.$industry->slug ? 'active' : '' }}"><a href="{{ route('industry-boxes.category.index', $industry->slug) }}">{{ $industry->title }}</a></li>
                                                        @endforeach
                                                        <hr class="mb-1 mt-1"/>
                                                        <li class="active menu-title"><a href="{{ route('category.all.index', 'industry-boxes') }}">View All</a></li>
                                                    </ul>
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-6 -->
                                            
                                            <div class="col-md-6">
                                                <div class="banner banner-overlay">
                                                    <a href="{{ route('category.all.index', 'industry-boxes') }}">
                                                        <img src="{{ URL::asset('assets/images/menu/industry-banner.png') }}" alt="Industry Boxes Banner"> 

                                                        <div class="banner-content banner-content-bottom">
                                                            <div class="banner-title text-white"><span>Industry<br/> Boxes</span></div><!-- End .banner-title -->
                                                        </div><!-- End .banner-content -->
                                                    </a>
                                                </div><!-- End .banner -->
                                            </div><!-- End .col-md-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu megamenu-sm -->    
                                </li>
                                @php

                                    $styles = \App\Category::where('main_category', 2)
                                                         ->orderBy('title', 'ASC')
                                                         ->limit(7)
                                                         ->get();

                                @endphp
                                <li class="{{ request()->routeIs('style-boxes.category.index') || request()->path() == 'main/box-styles' ? 'active' : '' }}">
                                    <a href="{{ route('category.all.index', 'box-styles') }}" class="sf-with-ul" style="padding-right: 25px;">Style Boxes</a>
                                    <div class="megamenu megamenu-sm">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <div class="menu-col">
                                                    <div class="menu-title">Categories</div><!-- End .menu-title -->
                                                    <ul>
                                                        @foreach($styles as $style)
                                                        <li class="{{ request()->path() == 'style-boxes/'.$style->slug ? 'active' : '' }}"><a href="{{ route('style-boxes.category.index', $style->slug) }}">{{ $style->title }}</a></li>
                                                        @endforeach
                                                        <hr class="mb-1 mt-1"/>
                                                        <li class="active menu-title"><a href="{{ route('category.all.index', 'box-styles') }}">View All</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="banner banner-overlay">
                                                    <a href="{{ route('category.all.index', 'box-styles') }}">
                                                        <img src="{{ URL::asset('assets/images/menu/style-banner.png') }}" class="img-fluid" alt="Style Boxes Banner"> 

                                                        <div class="banner-content banner-content-bottom">
                                                            <div class="banner-title text-white"><span>Style Boxes</span></div><!-- End .banner-title -->
                                                        </div><!-- End .banner-content -->
                                                    </a>
                                                </div><!-- End .banner -->
                                            </div><!-- End .col-md-6 -->
                                        </div>
                                    </div>
                                </li>
                                @php

                                    $others = \App\Category::where('main_category', 3)
                                             ->orderBy('title', 'ASC')
                                             ->limit(7)
                                             ->get();
                                
                                @endphp
                                <li class="{{ request()->routeIs('other-products.category.index') || request()->path() == 'main/other-products' ? 'active' : '' }}">
                                    <a href="{{ route('category.all.index', 'other-products') }}" class="sf-with-ul" style="padding-right: 25px;">Other Products</a>
                                    <div class="megamenu megamenu-sm">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <div class="menu-col">
                                                    <div class="menu-title">Categories</div><!-- End .menu-title -->
                                                    <ul>
                                                        @foreach($others as $other)
                                                        <li class="{{ request()->path() == 'other-products/'.$other->slug ? 'active' : '' }}"><a href="{{ route('other-products.category.index', $other->slug) }}">{{ $other->title }}</a></li>
                                                        @endforeach
                                                        <hr class="mb-1 mt-1"/>
                                                        <li class="active menu-title"><a href="{{ route('category.all.index', 'other-products') }}">View All</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="banner banner-overlay">
                                                    <a href="{{ route('category.all.index', 'other-products') }}">
                                                        <img src="{{ URL::asset('assets/images/menu/other-banner.png') }}" alt="Other Products Banner"> 

                                                        <div class="banner-content banner-content-bottom">
                                                            <div class="banner-title text-white"><span>Other<br/> Products</span></div><!-- End .banner-title -->
                                                        </div><!-- End .banner-content -->
                                                    </a>
                                                </div><!-- End .banner -->
                                            </div><!-- End .col-md-6 -->
                                        </div>
                                    </div>
                                </li>
                                <li class="{{ request()->path() == 'blogs' || request()->routeIs('blog.show') ? 'active' : '' }}">
                                    <a href="{{ route('blog.index') }}">Blog</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div>

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search" style="color: #000000;"></i></a>
                            <form name="search" action="{{ route('search') }}" method="POST">
                                @csrf
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search products..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                        <div class="pl-4 new_quote">  
                            <a href="{{ route('quote.index') }}" class="btn btn-outline-dark btn-glow btn-round">Request Quote</a>
                        </div>
                        <!-- End .compare-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .header-middle -->