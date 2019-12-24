@extends('admin')

@section('style-admin')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/plugins/forms/checkboxes-radios.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('app-assets/css/plugins/forms/validation/form-validation.css') }}">
<script src="{{ asset('app-assets/js/core/libraries/jquery.min.js') }}" ></script>

@endsection

@section('breadcrums')
	
	  <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Edit Main Category</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Main Categories</a>
            </li>
            <li class="breadcrumb-item active">Edit
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
    <strong>Well done!</strong> <span class="text-bold-600">{{ Session::get('success') }}</span>.
  </div>
  <script>

    $(document).ready(function(){
        setTimeout(function(){ toastr.success("{{ Session::get('success') }}", 'Vista Network Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
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
        setTimeout(function(){ toastr.error('You must fill in all of the required fields!', 'Vista Network Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
    });

  </script>
@endif

<div class="content-body">
  <form class="form" method="POST" action="{{ route('admin.main.category.update', $category->id) }}" enctype="multipart/form-data" novalidate>
  {{ csrf_field() }}
  {{ method_field('put') }}
  <div class="content-detached content-right">
    <div class="content-body">
      <section id="css-classes" class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Main Category</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="card-text">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                      <label for="title" class="text-bold-600 black">Category Title <span class="danger darken-4">*</span></label>
                      <input type="text" id="title" class="form-control" value="{{ $category->title }}" required data-validation-required-message="Category title field is required" name="title">
                      <div class="help-block font-small-3"></div>
                    </div>
                  </div>
                </div>
                <div class="row icheck_minimal skin">
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                      <label for="status" class="text-bold-600 black">Status <span class="danger darken-4">*</span></label>
                      <br/>
                      <input type="radio" name="status" id="input-radio-5" required data-validation-required-message="Status field is required" value="1" {{ $category->status == 1 ? 'checked' : '' }} /> <label for="input-radio-5">Active</label>
                      <br/>
                      <input type="radio" name="status" id="input-radio-6" required data-validation-required-message="Status field is required" value="0" {{ $category->status == 0 ? 'checked' : '' }} /> <label for="input-radio-6">Deactive</label>
                      <div class="help-block font-small-3"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-actions text-center">
                <button type="submit" class="btn btn-info round btn-glow px-2">
                   <span class="loading-spinner" style="display: none;"><i class="la la-refresh spinner"></i>&nbsp;Processing... Please wait.</span> 
                 <span class="without-load">Update</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <div class="sidebar-detached sidebar-left">
    <div class="sidebar">
      <div class="sidebar-content card d-none d-lg-block">
        <div class="card-body">
          <div class="category-title pb-1">
            <h6>Main Category Image</h6>
          </div> 
          <div class="text-center">
            <img class="card-img-top mb-1 img-fluid" data-src="holder.js/100px180/" src="{{ URL::asset('admin/app-assets/images/categories/'.$category->image) }}"
            alt="Admin image">
          </div>
          <h4 class="card-title">Change Image</h4>
          <input type="file" id="image" name="image">
        </div>
      </div>
    </div>
  </div>
  </form>
</div> 

@endsection

@section('script-admin')

  <script src="{{ URL::asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('app-assets/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('app-assets/js/scripts/forms/validation/form-validation.js') }}"
  type="text/javascript"></script>

@endsection
