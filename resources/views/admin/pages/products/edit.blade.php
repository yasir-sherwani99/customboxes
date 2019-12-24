@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/extensions/sweetalert.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/forms/icheck/icheck.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('templateEditor/ckeditor/ckeditor.js') }}"></script>

<script>

  $(document).ready(function(){

    $("#main_cat").change(function(){
    
      // main category id
      var cat_id = $(this).val();
      // empty the dropdown  
      $('#sub_cat').find('option').not(':first').remove();

      $.ajax({
        url: '/admin_panel/getSubCategories/'+cat_id,
        type: 'GET',
        success:function(result){
          if(result.status == "success"){
            var len = result.data.length;
            if(len != 0){   
              for(var i = 0; i < len; i++){
                var id = result.data[i]['id'];
                var title = result.data[i]['title'];
                $("#sub_cat").append("<option value='"+id+"'>"+title+"</option>");
              }
            } 
          }  
        }

      });

    });

    $(".image_btn").click(function(){

      var image_id = $(this).parent().find('.image_id').val();
    
      swal({
        title: "Confirm Image Delete?",
        text: "You are about to delete a product image",
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
                url: '/admin_panel/delete_image/'+image_id,
                type: 'GET', 
                success: function( result ) {
                  if(result.status == "success"){
                    swal("Success!", "Product image deleted successfully.", "success");
                    toastr.success('Product image deleted successfully.', 'Congratulations', {"  showDuration": 2000});
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
      <h3 class="content-header-title mb-0 d-inline-block">Edit Product</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Products</a>
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

<form class="form dropzone dropzone-area" id="dpz-btn-select-files" method="POST" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data" novalidate>
{{ csrf_field() }}
{{ method_field('put') }}
<div class="content-detached content-left">
  <div class="content-body">
    <section id="css-classes" class="card">
      <div class="card-header">
        <h4 class="card-title">Product Details</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="card-text">
            <div class="form-body">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="title" class="text-bold-600 black">Product Title <span class="danger darken-4">*</span></label>
                    <input type="text" id="title" class="form-control" value="{{ $product->title }}" required data-validation-required-message="Product title field is required" name="title">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="main_cat" class="text-bold-600 black">Main Category<span class="danger darken-4">*</span></label>
                    <select name="main_cat" id="main_cat" class="form-control" required data-validation-required-message="Main category field is required">
                      <option value="{{ $main_category_id }}">{{ $main_category_title }}</option>
                      @foreach($main_categories as $main_cat)
                      <option value="{{ $main_cat->id }}">{{ $main_cat->title }}</option>
                      @endforeach
                    </select>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="sub_cat" class="text-bold-600 black">Sub Category <span class="danger darken-4">*</span></label>
                    <select name="sub_cat" id="sub_cat" class="form-control" required data-validation-required-message="Sub category field is required">
                      <option value="{{ $product->category_id }}">{{ $product->category->title }}</option>
                      @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                      @endforeach
                    </select>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="price" class="text-bold-600 black">Price<span class="danger darken-4">*</span></label>
                    <input type="number" id="price" class="form-control" value="{{ $product->price }}" required data-validation-required-message="Price field is required" step=".01" name="price">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="stock" class="text-bold-600 black">Units in Stock <span class="danger darken-4">*</span></label>
                    <input type="number" id="stock" class="form-control" value="{{ $product->units_in_stock }}" required data-validation-required-message="Units in stock field is required" min="1" name="stock">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="image" class="text-bold-600 black">Description <span class="danger darken-4">*</span></label>
                      <textarea name="description" id="description" rows="5" class="form-control" required>{!! $product->description !!}</textarea>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              @php
                $sorted = $product->product->sortBy('id', SORT_REGULAR, false); 
              @endphp
              @if(!$product->product->isEmpty())
              @foreach($sorted as $key => $image)
              <div class="row d-flex mb-1 row_{{ $image->id }}">
                <div class="col-md-3 col-3 my-auto text-center">
                  <img src="{{ URL::asset('admin/app-assets/images/products/'.$image->image_big) }}" class="img-thumbnail img-fluid">
                </div>
                <div class="col-md-3 col-3 my-auto text-center">
                  <img src="{{ URL::asset('admin/app-assets/images/products/'.$image->image_medium) }}" class="img-thumbnail img-fluid">
                </div>
                <div class="col-md-3 col-3 my-auto text-center">
                  <img src="{{ URL::asset('admin/app-assets/images/products/'.$image->image_small) }}" class="img-thumbnail img-fluid">
                </div>
                <div class="col-md-2 offset-md-1 col-3 my-auto">
                  <input type="hidden" class="image_id" value="{{ $image->id }}">
                  <button class="btn btn-danger btn-sm image_btn" type="button"><i class="la la-trash font-small-3"></i> Delete</button>
                </div>
              </div>
              @endforeach
              @else
              <div class="row">
                <div class="col-md-12 col-12">
                  <span class="danger darken-4">This product has no image.</span>
                </div>
              </div>
              @endif
              <br/>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group increment">
                    <label for="image" class="text-bold-600 black">Product Images </label>
                    <div class="input-group">
                      <input type="file" id="image" class="form-control" name="image[]">
                      <div class="input-group-append">
                        <button class="btn btn-success prod_image_add_btn" type="button"><i class="la la-plus font-small-3 text-bold-600"></i></button>
                      </div>
                    </div>
                    <small>Add 4 images per product of size 1200 x 1200</small>
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
                    <input type="radio" name="status" id="input-radio-5" required data-validation-required-message="Category status field is required" value="1" {{ $product->status == 1 ? "checked" : "" }} /> <label for="input-radio-5">Active</label>
                    <br/>
                    <input type="radio" name="status" id="input-radio-6" required data-validation-required-message="Category status field is required" value="0" {{ $product->status == 0 ? "checked" : "" }} /> <label for="input-radio-6">Deactive</label>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
            </div>
        
            <div class="form-actions text-center">
              <button type="submit" class="btn btn-info btn-glow px-2">
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
<div class="sidebar-detached sidebar-right">
  <div class="sidebar">
    <div class="sidebar-content card d-none d-lg-block">
      <div class="card-body">
        <div class="category-title pb-2">
          <h4 class="card-title">Product Specifications</h4>
        </div> 
        <div class="card-text">
          <div class="form-body">
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="dimension" class="text-bold-600 black">Dimensions </label>
                  <input type="text" id="dimension" class="form-control" value="{{ $product->product_specification->dimensions }}" name="dimension">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="print" class="text-bold-600 black">Printing </label>
                  <input type="text" id="print" class="form-control" value="{{ $product->product_specification->printing }}" name="print">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="stock" class="text-bold-600 black">Paper Stock </label>
                  <textarea id="stock" class="form-control" rows="5" name="paper_stock">{{ $product->product_specification->paper_stock }}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="quantity" class="text-bold-600 black">Quantities </label>
                  <input type="text" id="quantity" class="form-control" value="{{ $product->product_specification->quantities }}" name="quantity">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="coat" class="text-bold-600 black">Coating </label>
                  <input type="text" id="coat" class="form-control" value="{{ $product->product_specification->coating }}" name="coat">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="default_process" class="text-bold-600 black">Default Process </label>
                  <input type="text" id="default_process" class="form-control" value="{{ $product->product_specification->default_process }}" name="default_process">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="option" class="text-bold-600 black">Options </label>
                  <input type="text" id="option" class="form-control" value="{{ $product->product_specification->options }}" name="option">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="proof" class="text-bold-600 black">Proof </label>
                  <input type="text" id="proof" class="form-control" value="{{ $product->product_specification->proof }}" name="proof">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="turn_around_time" class="text-bold-600 black">Turn around time </label>
                  <input type="text" id="turn_around_time" class="form-control" value="{{ $product->product_specification->turn_around_time }}" name="turn_around_time">
                </div>
              </div>
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
  
    CKEDITOR.replace('description', {

      removeButtons: 'Source,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks,About,Image,Table,Styles,Format,Font,FontSize,TextColor,Outdent,Indent,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BGColor,Smiley',

      height: 110

    });
  
  </script>

  <script src="{{ URL::asset('admin/app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/validation/form-validation.js') }}"
  type="text/javascript"></script>

@endsection