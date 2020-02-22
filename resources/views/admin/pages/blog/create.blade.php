@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/forms/selects/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/forms/icheck/icheck.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('templateEditor/ckeditor/ckeditor.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/extended/form-extended.css') }}">

@endsection

@section('breadcrums')
	
	<div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Post</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Posts</a>
            </li>
            <li class="breadcrumb-item active">New Blog Post
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

<form class="form" method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data" novalidate>
{{ csrf_field() }}
<div class="content-detached content-left">
  <div class="content-body">
    <section id="css-classes" class="card">
      <div class="card-header">
        <h4 class="card-title">Post Details</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="card-text">
            <div class="form-body">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="title" class="text-bold-600">Post Title <span class="danger darken-4">*</span></label>
                    <input type="text" id="title" class="form-control" placeholder="Post Title" required data-validation-required-message="Post title field is required" name="title">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
            <!--  <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="slug" class="text-bold-600 black">Slug <span class="danger darken-4">*</span></label>
                    <input type="text" id="slug" class="form-control" placeholder="Slug" required data-validation-required-message="Slug field is required" name="slug">
                    <small>The <i>"slug"</i> is the URL-friendly version of the title. It is usually all lowercase and contains only letters, numbers and hypens.
                    </small>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div> -->
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="category" class="text-bold-600">Category <span class="danger darken-4">*</span></label>
                    <select name="category" id="category" class="form-control" required data-validation-required-message="Category field is required">
                      <option value="">Select Category</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                      @endforeach
                    </select>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="description" class="text-bold-600">Description <span class="danger darken-4">*</span></label>
                    <textarea id="description" rows="5" class="form-control" name="description" placeholder="Announcement Description"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="image" class="text-bold-600">Image <span class="danger darken-4">*</span></label>
                    <input type="file" id="image" class="form-control" required data-validation-required-message="Post image field is required" name="image">
                    <small>post image of size 1200 x 1200</small>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="id_h5_multi" class="text-bold-600">Tags <span class="danger darken-4">*</span></label>
                    <select class="select2 form-control" required name="tags[]" multiple="multiple" id="id_h5_multi">
                      @foreach($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                      @endforeach
                    </select>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row icheck_minimal skin">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="status" class="text-bold-600 black">Status <span class="danger darken-4">*</span></label>
                    <br/>
                    <input type="radio" name="status" id="input-radio-5" required data-validation-required-message="Category status field is required" value="1" checked /> <label for="input-radio-5">Active</label>
                    <br/>
                    <input type="radio" name="status" id="input-radio-6" required data-validation-required-message="Category status field is required" value="0" /> <label for="input-radio-6">Deactive</label>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
            </div>
        
            <div class="form-actions text-center">
              <button type="submit" class="btn btn-info btn-glow px-2">
                 <span class="loading-spinner" style="display: none;"><i class="la la-refresh spinner"></i>&nbsp;Processing... Please wait.</span> 
               <span class="without-load">Create Post</span>
              </button>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="sidebar-detached sidebar-right">
  <div class="sidebar">
    <div class="sidebar-content card d-none d-lg-block">
      <div class="card-body">
        <div class="category-title pb-1">
          <h6>SEO Settings</h6>
        </div>
        <div class="row">
          <div class="col-md-12 col-12">
            <div class="form-group">
              <label for="page_title" class="text-bold-600 font-small-3">Title</label>
              <input type="text" id="page_title" class="form-control always-show-maxlength" placeholder="Page title" name="page_title" maxlength="57">
              <small>Max 57 characters</small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-12">
            <div class="form-group">
              <label for="page_description" class="text-bold-600 font-small-3">Description</label>
              <textarea class="form-control textarea-maxlength" id="page_description" name="page_description" placeholder="Page description" maxlength="250"></textarea>
              <small>Max 250 characters</small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-12">
            <div class="form-group">
              <label for="page_keyword" class="text-bold-600 font-small-3">Keywords</label>
              <input type="text" id="page_keyword" class="form-control always-show-maxlength" placeholder="Page keywords" name="page_keywords" maxlength="190">
              <small>E.g. HTML, CSS, JavaScript</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>

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
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/extended/form-maxlength.js') }}" type="text/javascript"></script>

@endsection