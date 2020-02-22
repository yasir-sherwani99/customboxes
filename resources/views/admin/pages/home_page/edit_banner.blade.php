@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

<script>

  $(document).ready(function(){
    
    $(".prod_image_add_btn").click(function(){ 
        var html = $(".clone").html();
        $(".increment").after(html);
    });

    $("body").on("click",".prod_image_remove_btn", function(){ 
        $(this).parents(".form-group").remove();
    });

  });

</script>

@endsection

@section('breadcrums')
	
	  <div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Banner</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Home Page</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Banners</a>
            </li>
            <li class="breadcrumb-item active">Edit Banner 
            </li>
          </ol>
        </div>
      </div>
    </div>
    
    <div class="content-header-right col-md-3 col-12">
      <a href="{{ route('admin.home_page_banners.index') }}" class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right">View All</a>
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

<div class="content-detached content-left">
  <div class="content-body">
    <section id="css-classes" class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Banner Image</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="card-text">
            <form class="form" method="POST" action="{{ route('admin.home_page_banners.update', $banner->id) }}" enctype="multipart/form-data" novalidate>
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-body">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="title" class="text-bold-600 black">Title <span class="danger darken-4">*</span></label>
                    <input type="text" id="title" class="form-control" value="{{ $banner_name }}" readonly>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    @if($banner_name == 'home_page_banner_1')
                    <img src="{{ URL::asset('admin/app-assets/images/banners/'.$banner->home_page_banner_1) }}" class="img-thumbnail img-fluid">
                    @elseif($banner_name == 'home_page_banner_2')
                    <img src="{{ URL::asset('admin/app-assets/images/banners/'.$banner->home_page_banner_2) }}" class="img-thumbnail img-fluid">
                    @elseif($banner_name == 'home_page_banner_3')
                    <img src="{{ URL::asset('admin/app-assets/images/banners/'.$banner->home_page_banner_3) }}" class="img-thumbnail img-fluid">
                    @else 
                    <img src="{{ URL::asset('admin/app-assets/images/banners/'.$banner->home_page_banner_4) }}" class="img-thumbnail img-fluid">
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="image" class="text-bold-600 black">Change Image <span class="danger darken-4">*</span></label>
                    <input type="file" id="image" class="form-control" required data-validation-required-message="Banner image field is required"  name="banner_image">
                    @if($banner_name == 'home_page_banner_1')
                      <small>Upload image of size 470 x 510 in pixels</small>
                    @elseif($banner_name == 'home_page_banner_2')
                      <small>Upload image of size 275 x 510 in pixels</small>
                    @elseif($banner_name == 'home_page_banner_3')
                      <small>Upload image of size 370 x 245 in pixels</small>
                    @else 
                      <small>Upload image of size 370 x 245 in pixels</small>
                    @endif
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div> 
            </div>
            
            <div class="form-actions text-center">
              <input type="hidden" value="{{ $banner_name }}" name="banner_name">
              <button type="submit" class="btn btn-info btn-glow px-2">
                 <span class="loading-spinner" style="display: none;"><i class="la la-refresh spinner"></i>&nbsp;Processing... Please wait.</span> 
               <span class="without-load">Update</span>
              </button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

@endsection

@section('script')

  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/validation/form-validation.js') }}"
  type="text/javascript"></script>

@endsection