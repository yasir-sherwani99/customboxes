@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/forms/icheck/icheck.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">
<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('templateEditor/ckeditor/ckeditor.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/extended/form-extended.css') }}">
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
	
	  <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">New Product</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Products</a>
            </li>
            <li class="breadcrumb-item active">New Product
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

<form class="form dropzone dropzone-area" id="dpz-btn-select-files" method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data" novalidate>
{{ csrf_field() }}
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
                    <input type="text" id="title" class="form-control" placeholder="Product title" required data-validation-required-message="Product title field is required" name="title">
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
              </div>  -->
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="top_description" class="text-bold-600 black">Product Introduction <span class="danger darken-4">*</span></label>
                      <textarea name="product_introduction" id="top_description" rows="5" class="form-control" required></textarea>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="main_cat" class="text-bold-600 black">Parent Category<span class="danger darken-4">*</span></label>
                    <select name="main_cat" id="main_cat" class="form-control" required data-validation-required-message="Parent category field is required">
                      <option value="">Select Parent Category</option>
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
                      <option value="">Select Sub Category</option>
                    </select>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
          <!--    <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="price" class="text-bold-600 black">Price<span class="danger darken-4">*</span></label>
                    <input type="number" id="price" class="form-control" placeholder="Price per unit" required data-validation-required-message="Price field is required" step=".01" name="price">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="stock" class="text-bold-600 black">Units in Stock <span class="danger darken-4">*</span></label>
                    <input type="number" id="stock" class="form-control" placeholder="Units in stock" required data-validation-required-message="Units in stock field is required" min="1" name="stock">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>  -->
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="bottom_description" class="text-bold-600 black">Product Description <span class="danger darken-4">*</span></label>
                      <textarea name="product_description" id="bottom_description" rows="5" class="form-control description" required></textarea>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group increment">
                    <label for="image" class="text-bold-600 black">Product Images <span class="danger darken-4">*</span></label>
                    <div class="input-group">
                      <input type="file" id="image" class="form-control" required data-validation-required-message="Product image field is required" name="image[]">
                      <div class="input-group-append">
                        <button class="btn btn-success prod_image_add_btn" type="button"><i class="la la-plus font-medium-1 text-bold-700"></i></button>
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
                          <button class="btn btn-danger prod_image_remove_btn" type="button"><i class="la la-times font-medium-1 text-bold-700"></i></button>
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
               <span class="without-load">Save</span>
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
  
    CKEDITOR.replace('product_introduction', {

      removeButtons: 'Source,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks,About,Image,Table,Styles,Format,Font,FontSize,TextColor,Outdent,Indent,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BGColor,Smiley',

      height: 110

    });

    CKEDITOR.replace('product_description', {

      removeButtons: 'Source,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Subscript,Superscript,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks,About,Image,Table,Styles,Format,Font,FontSize,TextColor,Outdent,Indent,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BGColor,Smiley',

      height: 220

    });
  
  </script>

  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/validation/form-validation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/extended/form-maxlength.js') }}" type="text/javascript"></script>

@endsection