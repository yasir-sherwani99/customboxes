@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/css/plugins/forms/validation/form-validation.css') }}">
<script src="{{ asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" ></script>

@endsection

@section('breadcrums')
	
	  <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Manage Email</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Settings</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Client Portal</a>
            </li>
            <li class="breadcrumb-item active">Email
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
        setTimeout(function(){ toastr.success("{{ Session::get('success') }}", 'CBE System Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
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
        setTimeout(function(){ toastr.error('You must fill in all of the required fields!', 'CBE System Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
    });

  </script>
@endif

<div class="content-detached content-left">
  <div class="content-body">
    <section id="css-classes" class="card">
      <div class="card-header">
        <h4 class="card-title float-left">Manage Emails</h4>
        <p class="float-right"><span class="text-bold-600 danger darken-4">*</span> These fields are required</p>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="card-text">
            <form class="form" method="POST" action="{{ route('admin.email.update', $email->id) }}" novalidate>
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-body">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="facebook" class="text-bold-600 black">Quotation Email </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                          <i class="la la-envelope"></i>
                        </span>
                      </div> 
                      <input type="email" id="quotation" class="form-control" value="{{ $email->quotation_email }}" required data-validation-required-message="Quotation email field is required" name="quotation">
                    </div>
                    <small>This email is for quotation purposes, it will used to received quotations.</small>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="contact" class="text-bold-600 black">Contact Email </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">
                          <i class="la la-envelope"></i>
                        </span>
                      </div> 
                      <input type="email" id="contact" class="form-control" value="{{ $email->contact_email }}" required data-validation-required-message="Contact email field is required" name="contact">
                    </div>
                    <small>This email is for contact purposes, it will used to received messages from contact us form.</small>
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
