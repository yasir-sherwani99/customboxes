                <div class="header-middle sticky-header">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ URL::asset('assets/images/logos/Logo_new.png') }}" alt="Custom Boxes Expert Logo" class="img-fluid">
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
                                    <a href="{{ route('category.all.index', 'industry-boxes') }}" class="sf-with-ul">Industry Boxes</a>
                                    <ul>
                                        @foreach($industries as $industry)
                                        <li class="{{ request()->path() == 'industry-boxes/'.$industry->slug ? 'active' : '' }}"><a href="{{ route('industry-boxes.category.index', $industry->slug) }}">{{ $industry->title }}</a></li>
                                        @endforeach
                                        <hr class="mb-1 mt-1"/>
                                        <li class="active"><a href="{{ route('category.all.index', 'industry-boxes') }}" style="color: black !important; font-weight: 500 !important;"><span>View All</span></a></li>
                                    </ul>
                                </li>
                                @php

                                    $styles = \App\Category::where('main_category', 2)
                                                         ->orderBy('title', 'ASC')
                                                         ->limit(7)
                                                         ->get();

                                @endphp
                                <li class="{{ request()->routeIs('style-boxes.category.index') || request()->path() == 'main/box-styles' ? 'active' : '' }}">
                                    <a href="{{ route('category.all.index', 'box-styles') }}" class="sf-with-ul">Style Boxes</a>
                                    <ul>
                                        @foreach($styles as $style)
                                        <li class="{{ request()->path() == 'style-boxes/'.$style->slug ? 'active' : '' }}"><a href="{{ route('style-boxes.category.index', $style->slug) }}">{{ $style->title }}</a></li>
                                        @endforeach
                                        <hr class="mb-1 mt-1"/>
                                        <li class="active"><a href="{{ route('category.all.index', 'box-styles') }}" style="color: black !important; font-weight: 500 !important;"><span>View All</span></a></li>
                                    </ul>
                                </li>
                                @php

                                    $others = \App\Category::where('main_category', 3)
                                             ->orderBy('title', 'ASC')
                                             ->limit(7)
                                             ->get();
                                
                                @endphp
                                <li class="{{ request()->routeIs('other-products.category.index') || request()->path() == 'main/other-products' ? 'active' : '' }}">
                                    <a href="{{ route('category.all.index', 'other-products') }}" class="sf-with-ul">Other Products</a>
                                    <ul>
                                        @foreach($others as $other)
                                        <li class="{{ request()->path() == 'other-products/'.$other->slug ? 'active' : '' }}"><a href="{{ route('other-products.category.index', $other->slug) }}">{{ $other->title }}</a></li>
                                        @endforeach
                                        <hr class="mb-1 mt-1"/>
                                        <li class="active"><a href="{{ route('category.all.index', 'other-products') }}" style="color: black !important; font-weight: 500 !important;"><span>View All</span></a></li>
                                    </ul>
                                </li>
                                <li class="{{ request()->path() == 'blogs' || request()->routeIs('blog.show') ? 'active' : '' }}">
                                    <a href="{{ route('blog.index') }}">Blog</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div>

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form name="search" action="{{ route('search') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search products..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                        <div class="wishlist">
                            <div class="quote">
                                <a href="{{ route('quote.index') }}">Request Quote</a>
                            </div>
                        </div><!-- End .compare-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .header-middle -->