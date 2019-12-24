@extends('admin')

@section('style')

<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" ></script>
<style>

.pagination {
   justify-content: center;
}

</style>

@endsection

@section('breadcrums')
	
	<div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Blog Categories</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Blog</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Posts</a>
            </li>
            <li class="breadcrumb-item active">View all
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right col-md-3 col-12">
      <a href="#" title="Create new announcement">
        <button class="btn btn-danger btn-sm box-shadow-2 round btn-min-width pull-right" type="button">New Blog Category</button>
      </a>
    </div>

@endsection

@section('content')

@if (Session::has('success'))
  <div class="alert alert-icon-left alert-arrow-left alert-success alert-dismissible mb-2" role="alert">
    <span class="alert-icon"><i class="la la-thumbs-o-up text-bold-600"></i></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Well done!</strong> <span class="text-bold-600">{{ Session::get('success') }}</span>.
  </div>
  <script>

    $(document).ready(function(){
        setTimeout(function(){ toastr.success("{{ Session::get('success') }}", 'CBE System Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
    });

  </script>
@endif

@if (count($errors) > 0)
  <div class="row">
      <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</b>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </div>
      </div>
  </div>
  <script>

    $(document).ready(function(){
        setTimeout(function(){ toastr.error('You must fill in all of the required fields!', 'CBE System Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
    });

  </script>
@endif

<div class="content-body">

    <section id="header-footer">
      <div class="row">
        <div class="col-12 mt-1 mb-1"> 
          <p>Manage all blogs.</p>
        </div>
      </div>
      @if(!$blogs->isEmpty())
        @foreach($blogs->chunk(3) as $chunk)
        <div class="row match-height">
          @foreach($chunk as $data)
            <div class="col-xl-4 col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{ $data->title }}</h4>
                </div>
                <div class="card-content">
                <!--  <div class="card-body">
                    <h5>Basic Card With Header & Footer</h5>
                  </div> -->
                  <img class="img-fluid" src="{{ URL::asset('admin/app-assets/images/blogs/'.$data->image) }}" alt="Blog image">
                  <div class="card-body">
                    @foreach($data->tag as $singleTag)
                    <span class="badge badge-pill badge-secondary">{{ $singleTag->title }}</span>
                    @endforeach
                  </div>
                </div>
                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                  <span class="float-left"><span class="badge badge-pill badge-danger">{{ $data->blog_category->title }}</span></span>
                  <span class="float-right">
                    <a href="{{ route('admin.blog.edit', $data->id) }}" class="card-link"><i class="la la-edit"></i> Edit </a>
                  </span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        @endforeach
      @else
        <div class="row match-height">
          <div class="col-xl-12 col-md-12">
            <hr/>
            <p class="danger darken-4">There are no post to show here...</p>
                
          </div>
        </div>
      @endif
    </section>

</div>

@endsection

@section('script')
@endsection