            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                Browse Categories <i class="icon-angle-down"></i>
                            </a>
                            @php

                                $categories = \App\Category::whereIn('main_category', [1, 2, 3])
                                                         ->inRandomOrder()
                                                         ->limit(10)
                                                         ->get();

                            @endphp
                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        @foreach($categories as $cat)
                                        <li><a href="{{ route('category.index', $cat->id) }}">{{ $cat->title }}</a></li>
                                        @endforeach
                                        <li class="item-lead"><a href="{{ route('category.all.index', 1) }}">View All </a></li>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="index.html" class="">Home</a>
                                </li>
                                @php

                                    $industries = \App\Category::where('main_category', 1)
                                                         ->orderBy('title', 'ASC')
                                                         ->limit(7)
                                                         ->get();

                                @endphp
                                <li>
                                    <a href="category.html" class="sf-with-ul">Industry Boxes</a>
                                    <ul>
                                        @foreach($industries as $industry)
                                        <li><a href="{{ route('category.index', $industry->id) }}">{{ $industry->title }}</a></li>
                                        @endforeach
                                        <li><a href="{{ route('category.all.index', 2) }}">View All</a></li>
                                    </ul>
                                </li>
                                @php

                                    $styles = \App\Category::where('main_category', 2)
                                                         ->orderBy('title', 'ASC')
                                                         ->limit(7)
                                                         ->get();

                                @endphp
                                <li>
                                    <a href="product.html" class="sf-with-ul">Box Styles</a>
                                    <ul>
                                        @foreach($styles as $style)
                                        <li><a href="{{ route('category.index', $style->id) }}">{{ $style->title }}</a></li>
                                        @endforeach
                                        <li><a href="{{ route('category.all.index', 3) }}">View All</a></li>
                                    </ul>
                                </li>
                                @php

                                    $others = \App\Category::where('main_category', 3)
                                             ->orderBy('title', 'ASC')
                                             ->limit(7)
                                             ->get();
                                
                                @endphp
                                <li>
                                    <a href="#" class="sf-with-ul">Other Products</a>
                                    <ul>
                                        @foreach($others as $other)
                                        <li><a href="{{ route('category.index', $other->id) }}">{{ $other->title }}</a></li>
                                        @endforeach
                                        <li><a href="category-4cols.html">View All</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.html">Blog</a>
                                </li>
                            <!--    <li>
                                    <a href="elements-list.html" class="sf-with-ul">Elements</a>

                                    <ul>
                                        <li><a href="elements-products.html">Products</a></li>
                                        <li><a href="elements-typography.html">Typography</a></li>
                                        <li><a href="elements-titles.html">Titles</a></li>
                                        <li><a href="elements-banners.html">Banners</a></li>
                                        <li><a href="elements-product-category.html">Product Category</a></li>
                                        <li><a href="elements-video-banners.html">Video Banners</a></li>
                                        <li><a href="elements-buttons.html">Buttons</a></li>
                                        <li><a href="elements-accordions.html">Accordions</a></li>
                                        <li><a href="elements-tabs.html">Tabs</a></li>
                                        <li><a href="elements-testimonials.html">Testimonials</a></li>
                                        <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                        <li><a href="elements-portfolio.html">Portfolio</a></li>
                                        <li><a href="elements-cta.html">Call to Action</a></li>
                                        <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                                    </ul>
                                </li> --> 
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                        <i class="la la-lightbulb-o" style="color: red;"></i><p>Packaging and Printing Expert</p>                        
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->