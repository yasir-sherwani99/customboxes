@extends('welcome')

@section('title')
    {{ isset($blog->page_title) ? $blog->page_title : 'Packaging Expert | Blog Posts' }}
@endsection

@section('keywords')
    {{ isset($blog->page_keywords) ? $blog->page_keywords : 'Packaging Expert | Blog Posts' }}
@endsection

@section('description')
    {{ isset($blog->page_description) ? $blog->page_description : 'Packaging Expert | Blog Posts' }}
@endsection

@section('style')

<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/nouislider/nouislider.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

@endsection

@section('content')

<main class="main">
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Post Details<span style="color: #0A72E8 !important;">Blog</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="entry single-entry">
                        <figure class="entry-media">
                            <img src="{{ URL::asset('admin/app-assets/images/blogs/'.$blog->image) }}" alt="Blog image">
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                <span class="entry-author">
                                    by <a href="#">Administrator</a>
                                </span>
                                @php
                                    $created = $blog->created_at;
                                    $created_at = \Carbon\Carbon::parse($created);
                                    $post_date = $created_at->toFormattedDateString();
                                @endphp
                                <span class="meta-separator">|</span>
                                <a href="#">{{ $post_date }}</a>
                              <!--  <span class="meta-separator">|</span>
                                <a href="#">2 Comments</a>  -->
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                {{ $blog->title }}
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats">
                                in <a href="#">{{ $blog->blog_category->title }}</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content editor-content">
                                {!! $blog->description !!}
                            </div><!-- End .entry-content -->

                            <div class="entry-footer row no-gutters flex-column flex-md-row">
                                <div class="col-md">
                                    <div class="entry-tags">
                                        <span>Tags:</span> 
                                            @foreach($blog->tag as $singleTag)
                                            <a href="#">{{ $singleTag->title }}</a> 
                                            @endforeach
                                    </div><!-- End .entry-tags -->
                                </div><!-- End .col -->

                            <!--    <div class="col-md-auto mt-2 mt-md-0">
                                    <div class="social-icons social-icons-color">
                                        <span class="social-label">Share this post:</span>
                                        <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                    </div>
                                </div> --><!-- End .col-auto -->
                            </div><!-- End .entry-footer row no-gutters -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <hr/>

                    <div class="related-posts">
                        <h3 class="title">Related Posts</h3><!-- End .title -->

                        <div class="owl-carousel owl-simple" data-toggle="owl" 
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
                                    }
                                }
                            }'>
                            @foreach($other_blogs as $other)
                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="{{ URL::asset('admin/app-assets/images/blogs/'.$other->image) }}" class="img-fluid" alt="blog image">
                                    </a>
                                </figure><!-- End .entry-media -->
                                @php
                                    $other_created = $other->created_at;
                                    $other_created_at = \Carbon\Carbon::parse($other_created);
                                    $other_post_date = $other_created_at->toFormattedDateString();
                                @endphp
                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="#">{{ $other_post_date }}</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="single.html">{{ $other->title }}</a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        in <a href="#">{{ $other->blog_category->title }}</a>
                                    </div><!-- End .entry-cats -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- End .related-posts -->
                </div><!-- End .col-lg-9 -->

                <aside class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <h3 class="widget-title">Search</h3><!-- End .widget-title -->

                            <form name="search_blog" method="POST" action="{{ route('search_blog') }}">
                                {{ csrf_field() }}
                                <label for="ws" class="sr-only">Search in blogs</label>
                                <input type="search" class="form-control" name="ws" id="ws" placeholder="Search in blogs" required>
                                <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                            </form>
                        </div><!-- End .widget -->

                        <hr/>

                        <div class="widget widget-cats">
                            <h3 class="widget-title">Categories</h3><!-- End .widget-title -->
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{ route('blog.index') }}">{{ $category->title }}<span>{{ $category->total_posts }}</span></a></li>
                                @endforeach
                            </ul>
                        </div><!-- End .widget -->

                        <hr/>

                        <div class="widget">
                            <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                            <ul class="posts-list">
                                @foreach($popular_posts as $popular)
                                <li>
                                    <figure>
                                        <a href="{{ route('blog.show', $popular->id) }}">
                                            <img src="{{ URL::asset('admin/app-assets/images/blogs/'.$popular->image) }}" style="width: 80px; height: 80px;" alt="popular post image">
                                        </a>
                                    </figure>
                                    @php
                                        $popular_created = $popular->created_at;
                                        $popular_created_at = \Carbon\Carbon::parse($popular_created);
                                        $popular_post_date = $popular_created_at->toFormattedDateString();
                                    @endphp
                                    <div>
                                        <span>{{ $popular_post_date }}</span>
                                        <h4><a href="{{ route('blog.show', $popular->id) }}">{{ $popular->title }}</a></h4>
                                    </div>
                                </li>
                                @endforeach
                            </ul><!-- End .posts-list -->
                        </div><!-- End .widget -->

                    <!--    <div class="widget">
                            <h3 class="widget-title">Browse Tags</h3>

                            <div class="tagcloud">
                                <a href="#">fashion</a>
                                <a href="#">style</a>
                                <a href="#">women</a>
                                <a href="#">photography</a>
                                <a href="#">travel</a>
                                <a href="#">shopping</a>
                                <a href="#">hobbies</a>
                            </div>
                        </div> --><!-- End .widget -->

                    <!--    <div class="widget widget-text">
                            <h3 class="widget-title">About Blog</h3>

                            <div class="widget-text-content">
                                <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                            </div>
                        </div> --><!-- End .widget -->
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
