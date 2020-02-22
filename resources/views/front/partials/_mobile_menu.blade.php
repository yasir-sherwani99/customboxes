    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form method="post" action="{{ route('search') }}" class="mobile-search">
                {{ csrf_field() }}
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" id="mobile-search" name="q" placeholder="Search products..." required>
                <button class="btn btn-primary" name="submit" type="submit"><i class="icon-search"></i></button>
            </form> 
            
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="{{ request()->path() == '/' ? 'active' : '' }}">
                        <a href="{{ url('/') }}">HOME</a>
                    </li>
                    @php

                        $industries = \App\Category::where('main_category', 1)
                                             ->orderBy('title', 'ASC')
                                             ->limit(7)
                                             ->get();

                    @endphp
                    <li>
                        <a href="{{ route('category.all.index', 'industry-boxes') }}">Industry Boxes</a>
                        <ul>
                            @foreach($industries as $industry)
                            <li><a href="{{ route('industry-boxes.category.index', $industry->slug) }}">{{ $industry->title }}</a></li>
                            @endforeach
                            <hr class="mb-1 mt-1"/>
                            <li class="active"><a href="{{ route('category.all.index', 'industry-boxes') }}">View All</a></li>
                        </ul>
                    </li>
                    @php

                        $styles = \App\Category::where('main_category', 2)
                                             ->orderBy('title', 'ASC')
                                             ->limit(7)
                                             ->get();

                    @endphp
                    <li>
                        <a href="{{ route('category.all.index', 'box-styles') }}">Style Boxes</a>
                        <ul>
                            @foreach($styles as $style)
                            <li><a href="{{ route('style-boxes.category.index', $style->slug) }}">{{ $style->title }}</a></li>
                            @endforeach
                            <hr class="mb-1 mt-1"/>
                            <li class="active"><a href="{{ route('category.all.index', 'box-styles') }}">View All</a></li>
                        </ul>
                    </li>
                    @php

                        $others = \App\Category::where('main_category', 3)
                                 ->orderBy('title', 'ASC')
                                 ->limit(7)
                                 ->get();
                    
                    @endphp
                    <li>
                        <a href="{{ route('category.all.index', 'other-products') }}">Other Products</a>
                        <ul>
                            @foreach($others as $other)
                            <li><a href="{{ route('other-products.category.index', $other->slug) }}">{{ $other->title }}</a></li>
                            @endforeach
                            <hr class="mb-1 mt-1"/>
                            <li class="active"><a href="{{ route('category.all.index', 'other-products') }}">View All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('blog.index') }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('quote.index') }}">Request Quote</a>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->
            @php
                $general = \App\General::findOrFail(1);
            @endphp
            <div class="social-icons">
                <a href="{{ isset($general->facebook) ? 'https://' . $general->facebook : '#' }}" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="{{ isset($general->twitter) ? 'https://' . $general->twitter : '#' }}" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="{{ isset($general->instagram) ? 'https://' . $general->instagram : '#' }}" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="{{ isset($general->youtube) ? 'https://' . $general->youtube : '#' }}" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->