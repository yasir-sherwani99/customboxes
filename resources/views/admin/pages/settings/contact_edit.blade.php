@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">
<script src="{{ asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" ></script>

@endsection

@section('breadcrums')
	
	  <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Contact Info</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Website Settings</a>
            </li>
            <li class="breadcrumb-item active">Edit Contact Info
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

<div class="content-detached content-left">
  <div class="content-body">
    <section id="css-classes" class="card">
      <div class="card-header">
        <h4 class="card-title float-left">Contact Info</h4>
        <p class="float-right"><span class="text-bold-600 danger darken-4">*</span> These fields are required</p>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="card-text">
            <form class="form" method="POST" action="{{ route('admin.contact.update', $contact->id) }}" novalidate>
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-body">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="business" class="text-bold-600 black">Business Title <span class="danger darken-4">*</span></label>
                    <input type="text" id="business" class="form-control" value="{{ $contact->business_title }}" required data-validation-required-message="Business title field is required" name="title">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="email" class="text-bold-600 black">Email <span class="danger darken-4">*</span></label>
                    <input type="text" id="email" class="form-control" value="{{ $contact->email }}" required data-validation-required-message="Email field is required" name="email">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="phone" class="text-bold-600 black">Phone No. <span class="danger darken-4">*</span></label>
                    <input type="text" id="phone" class="form-control" value="{{ $contact->phone }}" required data-validation-required-message="Phone field is required" name="mobile">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="street" class="text-bold-600 black">Street Address <span class="danger darken-4">*</span></label>
                    <input type="text" id="street" class="form-control" value="{{ $contact->street_address }}" required data-validation-required-message="Street address field is required" name="street">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="city" class="text-bold-600 black">City <span class="danger darken-4">*</span></label>
                    <input type="text" id="city" class="form-control" value="{{ $contact->city }}" required data-validation-required-message="City field is required" name="city">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="state" class="text-bold-600 black">State <span class="danger darken-4">*</span></label>
                    <input type="text" id="state" class="form-control" value="{{ $contact->state }}" required data-validation-required-message="State field is required" name="state">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="zip" class="text-bold-600 black">Zip Code <span class="danger darken-4">*</span></label>
                    <input type="text" id="zip" class="form-control" value="{{ $contact->zip }}" required data-validation-required-message="Zip code field is required" name="zip">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="country" class="text-bold-600 black">Country <span class="danger darken-4">*</span></label>
                    <input type="text" id="country" class="form-control" value="{{ $contact->country }}" required data-validation-required-message="Country field is required" name="country">
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

@endsection

@section('script')

  <script src="{{ URL::asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
  type="text/javascript"></script>
  <script src="{{ URL::asset('admin/app-assets/js/scripts/forms/validation/form-validation.js') }}"
  type="text/javascript"></script>

@endsection
