@extends('welcome')

@section('title')
    {{ 'Packaging Expert | Blog Posts' }}
@endsection

@section('keywords')
    {{ 'Packaging Expert | Blog Posts' }}
@endsection

@section('description')
    {{ 'Packaging Expert | Blog Posts' }}
@endsection

@section('style')

<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

<style>

.pagination {
   justify-content: center;
}

</style>

@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Blog<span style="color: #0A72E8 !important;">Posts</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <nav class="blog-nav">
                <ul class="menu-cat entry-filter justify-content-center">
                    <li class="active"><a href="#" data-filter="*">All Blog Posts<span>{{ $total_posts }}</span></a></li>
                    @foreach($other_categories as $category)
                    <li><a href="#" data-filter=".{{ $category->cat_slug }}">{{ $category->title }}<span>{{ $category->total_posts }}</span></a></li>
                    @endforeach
                </ul><!-- End .blog-menu -->
            </nav><!-- End .blog-nav -->

            <div class="entry-container max-col-4" data-layout="fitRows">
                @foreach($blogs as $blog)
                <div class="entry-item {{ $blog->blog_category->slug }} col-sm-6 col-md-4 col-lg-3">
                    <article class="entry entry-grid text-center">
                        <figure class="entry-media">
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                <img src="{{ URL::asset('admin/app-assets/images/blogs/'.$blog->image) }}" class="img-fluid" alt="Post image">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            @php
                                $created = $blog->created_at;
                                $created_at = \Carbon\Carbon::parse($created);
                                $post_date = $created_at->toFormattedDateString();
                            @endphp
                            <div class="entry-meta">
                                <a href="#">{{ $post_date }}</a>
                               <!-- <span class="meta-separator">|</span>
                                <a href="#">2 Comments</a> -->
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title" style="font-weight: 600;">
                                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats">
                                in <a href="#">{{ $blog->blog_category->title }}</a>
                            </div><!-- End .entry-cats -->
                            @php 
                          
                                $desc_len = strlen($blog->description); 
                                $desc_sub = substr($blog->description, 0,100);
                                if($desc_len > 100){
                                    $description = $desc_sub . " ...";
                                }
                                else{
                                    $description = $blog->description;
                                }
                                
                            @endphp
                            <div class="entry-content">
                                <p>{!! $description !!}</p>
                                <a href="{{ route('blog.show', $blog->slug) }}" class="read-more">Continue Reading</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->
                @endforeach
            </div><!-- End .entry-container -->

            <nav aria-label="Page navigation">
                {{ $blogs->links() }}
            </nav>
        </div><!-- End .container -->
    </div><!-- End .page-content -->
    @include('front.partials._quote')
</main><!-- End .main -->

@endsection

@section('script')

<script src="{{ URL::asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/isotope.pkgd.min.js') }}"></script>

@endsection
