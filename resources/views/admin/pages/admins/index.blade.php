@extends('admin')

@section('style')

<script src="{{ asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" ></script>

@endsection

@section('breadcrums')
	
  <div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
    <h3 class="content-header-title mb-0 d-inline-block">Administrators</h3>
    <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
          </li>
          <li class="breadcrumb-item"><a href="javascript:;">System Administrators</a>
          </li>
          <li class="breadcrumb-item"><a href="javascript:;">Management</a>
          </li>
          <li class="breadcrumb-item active">View all
          </li>
        </ol>
      </div>
    </div>
  </div>
  <div class="content-header-right col-md-3 col-12">
    <a href="#">
      <button class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" type="button">New Administrator</button>
    </a>
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

<div class="content-body">

  <section id="user-profile-cards" class="row mt-2">
    <div class="col-12">
      <h4 class="text-uppercase">Admin Profiles</h4>
      <p>Manage system administrators.</p>
    </div>
    @foreach($admins as $admin)
    <div class="col-xl-4 col-md-6 col-12">
      <div class="card card border-teal border-lighten-2">
        <div class="text-center">
          <div class="card-body">
            @if($admin->image == NULL)
            <img src="{{ URL::asset('admin/app-assets/images/admin_images/default-avatar.png') }}" alt="admin avatar"><i></i>
            @else
            <img src="{{ URL::asset('admin/app-assets/images/admin_images/'.$admin->image) }}" alt="admin avatar"><i></i>
            @endif
          </div>
          <div class="card-body">
            <h4 class="card-title">{{ $admin->first_name }}&nbsp;{{ $admin->last_name }}</h4>
            <ul class="list-inline list-inline-pipe">
              <li>
                  @if($admin->status == 1)
                    <span class="success darken-4">Active</span>
                  @else
                    <span class="danger darken-4">Inactive</span>
                  @endif
              </li>
            </ul>
            <h6 class="card-subtitle text-muted">{{ $admin->designation }}</h6>
          </div>
          <div class="card-body">
            <a href="{{ route('admin.administrators.edit', $admin->id) }}">
              <button type="button" class="btn btn-outline-info btn-md mr-1"><i class="la la-edit"></i> Edit Profile</button>
            </a>
          <!--  <button type="button" class="btn btn-primary mr-1"><i class="la la-eye"></i> Profile</button>  -->
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </section>

</div>

@endsection

@section('script-admin')
@endsection