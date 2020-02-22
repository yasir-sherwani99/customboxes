@extends('admin')

@section('style')

<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

<style>

.pagination {
   justify-content: center;
}

</style>

@endsection

@section('breadcrums')
	
	<div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Categories</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Categories
            </li>
          </ol>
        </div>
      </div>
    </div>

@endsection

@section('content')

@if (Session::has('success'))
  <div class="alert alert-icon-left alert-arrow-left alert-success alert-dismissible mb-2" role="alert">
    <span class="alert-icon"><i class="la la-thumbs-o-up text-bold-600"></i></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Well done!</strong> <span class="text-bold-600">{{ Session::get('success') }}</span>
  </div>
  <script>

    $(document).ready(function(){
        setTimeout(function(){ toastr.success("{{ Session::get('success') }}", 'PX System Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
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
        setTimeout(function(){ toastr.error('You must fill in all of the required fields!', 'PX System Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
    });

  </script>
@endif

<div class="content-body">
    
    <section id="header-footer">
      <div class="row">
        <div class="col-12 mt-1 mb-1">
          <!-- <h4 class="text-uppercase">Category</h4>  -->
          <p>Manage custom boxes expert categories.</p>
        </div>
      </div>
      @if(!$categories->isEmpty())
        @foreach($categories->chunk(4) as $chunk)
        <div class="row match-height">
          @foreach($chunk as $data)
          <div class="col-xl-3 col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">{{ $data->title }}</h4>
              </div>
              <div class="card-content">
                <!-- <div class="card-body">
                  <h5 class="card-title"></h5>
                </div> -->
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    @foreach($data->category as $key => $image)
                    <li data-target="#carousel-example" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                  </ol>
                  <div class="carousel-inner" role="listbox">
                    @foreach($data->category as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                      <img src="{{ URL::asset('admin/app-assets/images/categories/'.$image->image) }}" class="d-block w-100">
                    </div>
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                    <span class="la la-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                    <span class="la la-angle-right icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <div class="card-body">
                  <p class="card-text"></p>
                  <div class="mb-2">
                    <span class="float-left"></span>  
                    <span class="float-right"><a href="{{ route('admin.subcategory.edit', $data->id) }}"><i class="la la-edit"></i> Edit</a></span>  
                  </div>
                </div>
              </div>
              <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                @if($data->status == 1)
                  <span class="float-left badge border-success border-darken-4 success darken-4 badge-border">Active</span>
                @else
                  <span class="float-left badge border-danger border-darken-4 danger darken-4 round badge-border">Inactive</span>
                @endif
                <span class="tags float-right">
                  <span class="badge badge-pill badge-danger">{{ $data->main_category }}</span>
                  <!-- <span class="badge badge-pill badge-danger">Design</span> -->
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
            <p class="danger darken-4">There are no products to show here...</p>
                
          </div>
        </div>
      @endif
    </section>

</div>

@endsection

@section('script')
@endsection