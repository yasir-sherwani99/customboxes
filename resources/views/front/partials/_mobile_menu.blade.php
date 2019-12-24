    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
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
                        <a href="{{ route('category.all.index', 1) }}">Industry Boxes</a>
                        <ul>
                            @foreach($industries as $industry)
                            <li><a href="{{ route('category.index', $industry->id) }}">{{ $industry->title }}</a></li>
                            @endforeach
                            <hr class="mb-1 mt-1"/>
                            <li class="active"><a href="{{ route('category.all.index', 1) }}">View All</a></li>
                        </ul>
                    </li>
                    @php

                        $styles = \App\Category::where('main_category', 2)
                                             ->orderBy('title', 'ASC')
                                             ->limit(7)
                                             ->get();

                    @endphp
                    <li>
                        <a href="{{ route('category.all.index', 2) }}">Style Boxes</a>
                        <ul>
                            @foreach($styles as $style)
                            <li><a href="{{ route('category.index', $style->id) }}">{{ $style->title }}</a></li>
                            @endforeach
                            <hr class="mb-1 mt-1"/>
                            <li class="active"><a href="{{ route('category.all.index', 2) }}">View All</a></li>
                        </ul>
                    </li>
                    @php

                        $others = \App\Category::where('main_category', 3)
                                 ->orderBy('title', 'ASC')
                                 ->limit(7)
                                 ->get();
                    
                    @endphp
                    <li>
                        <a href="{{ route('category.all.index', 3) }}">Other Products</a>
                        <ul>
                            @foreach($others as $other)
                            <li><a href="{{ route('category.index', $other->id) }}">{{ $other->title }}</a></li>
                            @endforeach
                            <hr class="mb-1 mt-1"/>
                            <li class="active"><a href="{{ route('category.all.index', 3) }}">View All</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('blog.index') }}">Blog</a>
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