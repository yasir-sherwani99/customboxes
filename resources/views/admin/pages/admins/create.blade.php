@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/vendors/css/forms/icheck/icheck.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">

@endsection

@section('breadcrums')
	
	  <div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Administrators</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Admin Management</a>
            </li>
            <li class="breadcrumb-item active">New Administrator
            </li>
          </ol>
        </div>
      </div>
    </div>
    
    <div class="content-header-right col-md-3 col-12">
      <a href="{{ route('admin.administrators.index') }}" class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right">View All</a>
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
  <div class="content-detached content-left">
    <div class="content-body">
      <section id="css-classes" class="card">
        <div class="card-header">
          <h4 class="card-title">Administrator</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="card-text">
              <form class="form" method="POST" action="{{ route('admin.administrators.store') }}" enctype="multipart/form-data" novalidate>
              {{ csrf_field() }}
              <div class="form-body">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="first_name" class="text-bold-600 black">First Name <span class="danger darken-4">*</span></label>
                      <input type="text" id="first_name" class="form-control" placeholder="First Name" required data-validation-required-message="First name field is required" name="first_name">
                      <div class="help-block font-small-3"></div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="last_name" class="text-bold-600 black">Last Name <span class="danger darken-4">*</span></label>
                      <input type="text" id="last_name" class="form-control" placeholder="Last Name" required data-validation-required-message="Last name field is required" name="last_name">
                      <div class="help-block font-small-3"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="email" class="text-bold-600 black">Email <span class="danger darken-4">*</span></label>
                      <input type="text" id="email" class="form-control" placeholder="Email" required data-validation-required-message="Email field is required" name="email">
                      <div class="help-block font-small-3"></div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="designation" class="text-bold-600 black">Designation <span class="danger darken-4">*</span></label>
                      <input type="text" id="designation" class="form-control" placeholder="Designation" required data-validation-required-message="Designation field is required" name="designation">
                      <div class="help-block font-small-3"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="password" class="text-bold-600 black">Password <span class="danger darken-4">*</span></label>
                      <input type="password" id="password" class="form-control" placeholder="Password" required data-validation-required-message="Password field is required" name="password" minlength="6">
                      <small>Password must contain at least 6 characters.</small><br/>
                      <div class="help-block font-small-3"></div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="confirm_password" class="text-bold-600 black">Confirm Password <span class="danger darken-4">*</span></label>
                      <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" data-validation-matches-match="password"
                      data-validation-matches-message="Password & Confirm Password must be the same." name="password_confirmation">
                      <div class="help-block font-small-3"></div>
                    </div>
                  </div>
                </div>
                <div class="row icheck_minimal skin">
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                      <label for="status" class="text-bold-600 black">Status <span class="danger darken-4">*</span></label>
                      <br/>
                      <input type="radio" name="status" id="input-radio-5" required data-validation-required-message="Status field is required" value="1" checked /> <label for="input-radio-5">Active</label>
                      <br/>
                      <input type="radio" name="status" id="input-radio-6" required data-validation-required-message="Status field is required" value="0" /> <label for="input-radio-6">Deactive</label>
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
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!--
  <div class="sidebar-detached sidebar-right">
    <div class="sidebar">
      <div class="sidebar-content card d-none d-lg-block">
        <div class="card-body">
          <div class="category-title pb-1">
            <h5 class="text-bold-600 black">Vista Products</h5>
          </div> 
          <div>
            <p>List of vista products.</p>
            <p>
               <ul>
                  <li>Infinity HP1000 Altcoin Home Miner</li>
                  <li>Vista AI BTC\Altcoins Crypt Trading Bots</li>
                  <li>Vista AI Trading Bots Forex</li>
                  <li>Mini Miner</li>
                  <li>Vista Bluecube Technology</li>
                  <li>Vista Torro</li>
               </ul>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div>

@endsection

@section('script')

  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/validation/form-validation.js') }}"
  type="text/javascript"></script>

@endsection
