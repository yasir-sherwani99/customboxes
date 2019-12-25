@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/forms/selects/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/forms/icheck/icheck.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('templateEditor/ckeditor/ckeditor.js') }}"></script>

@endsection

@section('breadcrums')
	
	<div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Post</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Blog</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Post</a>
            </li>
            <li class="breadcrumb-item active">Edit
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right col-md-3 col-12">
      <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right">View All</a>
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
  <form class="form" method="POST" action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data" novalidate>
  {{ csrf_field() }}
  {{ method_field('put') }}
  <div class="content-detached content-right">
    <div class="content-body">
      <section id="css-classes" class="card">
        <div class="card-header">
          <h4 class="card-title">Edit Post</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="card-text">
              <div class="form-body">
                <div class="form-group">
                  <label for="title" class="text-bold-600">Post Title <span class="danger darken-4">*</span></label>
                  <input type="text" id="title" class="form-control" value="{{ $blog->title }}" required data-validation-required-message="Post title field is required" name="title">
                  <div class="help-block font-small-3"></div>
                </div>
                <div class="form-group">
                  <label for="category" class="text-bold-600">Category <span class="danger darken-4">*</span></label>
                  <select name="category" id="category" class="form-control" required data-validation-required-message="Category field is required">
                    <option value="{{ $blog->category_id }}">{{ $blog_category_title }}</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                  </select>
                  <div class="help-block font-small-3"></div>
                </div>
                <div class="form-group">
                  <label for="description" class="text-bold-600">Description <span class="danger darken-4">*</span></label>
                  <textarea id="description" rows="5" class="form-control" name="description">{{ $blog->description }}</textarea>
                </div>
                <div class="form-group">
                  <label for="id_h5_multi" class="text-bold-600">Tags <span class="danger darken-4">*</span></label>
                  <select class="select2 form-control" required name="tags[]" multiple="multiple" id="id_h5_multi">
                    @foreach($blog->tag as $key => $value)
                    <option value="{{ $value->id }}" selected="">{{ $value->title }}</option>
                    @endforeach
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                  </select>
                  <div class="help-block font-small-3"></div>
                </div>
                <div class="form-group icheck_minimal skin">
                  <label for="status" class="text-bold-600 black">Status <span class="danger darken-4">*</span></label>
                  <br/>
                  <input type="radio" name="status" id="input-radio-5" required data-validation-required-message="Status field is required" value="1" {{ $blog->status == 1 ? 'checked' : '' }}  /> <label for="input-radio-5">Enable</label>
                  <br/>
                  <input type="radio" name="status" id="input-radio-6" required data-validation-required-message="Status field is required" value="0" {{ $blog->status == 0 ? 'checked' : '' }} /> <label for="input-radio-6">Disable</label>
                  <div class="help-block font-small-3"></div>
                </div>
              </div>
              <div class="form-actions text-center">
                <button type="submit" class="btn btn-info btn-glow px-2">
                   <span class="loading-spinner" style="display: none;"><i class="la la-refresh spinner"></i>&nbsp;Processing... Please wait.</span> 
             	   <span class="without-load">Update Post</span>
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
            <h6>Post Image</h6>
          </div> 
          <div class="text-center">
            <img class="card-img-top mb-1 img-fluid" data-src="holder.js/100px180/" src="{{ URL::asset('admin/app-assets/images/blogs/'.$blog->image) }}"
            alt="Post image">
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

@section('script')

  <script type="text/javascript">

	  CKEDITOR.replace( 'description', {
	    filebrowserUploadUrl: "{{ route('admin.upload.ckeditor', ['_token' => csrf_token() ]) }}",
	    filebrowserUploadMethod: 'form'
	  });

	  CKEDITOR.on('dialogDefinition', function(e) {
	      dialogName = e.data.name;
	      dialogDefinition = e.data.definition;
	      if(dialogName == 'image') {
	        dialogDefinition.removeContents('Link');
	        dialogDefinition.removeContents('advanced');
	        var tabContent = dialogDefinition.getContents('info');
	        tabContent.remove('txtHSpace');
	        tabContent.remove('txtVSpace');
	      }
	  });

  </script>

  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/validation/form-validation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>

@endsection