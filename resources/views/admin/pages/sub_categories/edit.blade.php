@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/extensions/sweetalert.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/forms/icheck/icheck.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

<script>

  $(document).ready(function(){

    $(".image_btn").click(function(){

      var image_id = $(this).parent().find('.image_id').val();
    
      swal({
        title: "Confirm Image Delete?",
        text: "You are about to delete a category image",
        icon: "warning",
        showCancelButton: true,
        buttons: {
            cancel: {
                text: "No, Cancel plz!",
                value: null,
                visible: true,
                className: "btn-danger",
                closeModal: false,
            },
            confirm: {
                text: "Yes, I Confirm!",
                value: true,
                visible: true,
                className: "btn-success",
                closeModal: false
            }
        }
      }).then(isConfirm => {
          if (isConfirm) {
            $.ajax({
                url: '/admin_panel/subcategory/delete_image/'+image_id,
                type: 'GET', 
                success: function( result ) {
                  if(result.status == "success"){
                    swal("Success!", "Category image deleted successfully.", "success");
                    toastr.success('Category image deleted successfully.', 'Congratulations', {"  showDuration": 2000});
                    $(".row_"+image_id).removeClass('d-flex');
                    $(".row_"+image_id).addClass('d-none');
                  } 
                },
                error: function (data) {
                  swal("Error!", "There are some technical issues!", "error");
                  toastr.error('There are some technical issues.', 'Error', {"showDuration": 500});
                      
                }
            });

          } else {
              swal("Cancelled", "You clicked the cancel button :)", "error");
              toastr.error('You clicked the cancel button', 'Cancelled', {"showDuration": 1000});
          }
      });

    });

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
      <h3 class="content-header-title mb-0 d-inline-block">Edit Category</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Categories</a>
            </li>
            <li class="breadcrumb-item active">Edit
            </li>
          </ol>
        </div>
      </div>
    </div>
    
    <div class="content-header-right col-md-3 col-12">
      <a href="#" class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right">View All</a>
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
        <h4 class="card-title">Subcategory Details</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="card-text">
            <form class="form dropzone dropzone-area" id="dpz-btn-select-files" method="POST" action="{{ route('admin.subcategory.update', $category->id) }}" enctype="multipart/form-data" novalidate>
            {{ csrf_field() }}
            {{ method_field('put') }}
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
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="main" class="text-bold-600 black">Main Category <span class="danger darken-4">*</span></label>
                    <select name="main_cat" id="main" class="form-control" required data-validation-required-message="Main category field is required">
                      <option value="{{ $category->main_category_id }}">{{ $category->main_category_title }}</option>
                      @foreach($main_categories as $main_cat)
                      <option value="{{ $main_cat->id }}">{{ $main_cat->title }}</option>
                      @endforeach
                    </select>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              @if(!$category->category->isEmpty())
              @foreach($category->category as $key => $image)
              <div class="row d-flex mb-1 row_{{ $image->id }}">
                <div class="col-md-2 col-8 my-auto">
                  <img src="{{ URL::asset('admin/app-assets/images/categories/'.$image->image) }}" class="img-thumbnail img-fluid">
                </div>
                <div class="col-md-2 offset-md-8 col-4 my-auto">
                  <input type="hidden" class="image_id" value="{{ $image->id }}">
                  <button class="btn btn-danger btn-sm image_btn" type="button"><i class="la la-trash font-small-3"></i> Delete</button>
                </div>
              </div>
              @endforeach
              @else
              <div class="row">
                <div class="col-md-12 col-12">
                  <span class="danger darken-4">This category has no image.</span>
                </div>
              </div>
              @endif
              <br/>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group increment">
                    <label for="image" class="text-bold-600 black">Category Images </label>
                    <div class="input-group">
                      <input type="file" id="image" class="form-control" name="image[]">
                      <div class="input-group-append">
                        <button class="btn btn-success prod_image_add_btn" type="button"><i class="la la-plus font-small-3 text-bold-600"></i></button>
                      </div>
                    </div>
                    <small>Add 2 images per category of size 450 x 450</small>
                    <div class="help-block font-small-3"></div>
                  </div>
                  <div class="clone d-none">
                    <div class="form-group">
                      <div class="input-group">
                        <input type="file" class="form-control" name="image[]">
                        <div class="input-group-append">
                          <button class="btn btn-danger prod_image_remove_btn" type="button"><i class="la la-times font-small-3 text-bold-600"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row icheck_minimal skin">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="status" class="text-bold-600 black">Status <span class="danger darken-4">*</span></label>
                    <br/>
                    <input type="radio" name="status" id="input-radio-5" required data-validation-required-message="Category status field is required" value="1" {{ $category->status == 1 ? "checked" : "" }} /> <label for="input-radio-5">Active</label>
                    <br/>
                    <input type="radio" name="status" id="input-radio-6" required data-validation-required-message="Category status field is required" value="0" {{ $category->status == 0 ? "checked" : "" }} /> <label for="input-radio-6">Deactive</label>
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
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

@endsection

@section('script')

  <script src="{{ URL::asset('admin/app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/validation/form-validation.js') }}"
  type="text/javascript"></script>

@endsection