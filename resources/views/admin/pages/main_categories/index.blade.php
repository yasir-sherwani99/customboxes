@extends('admin')

@section('style')

<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

<style>

.pagination {
   justify-content: center;
}

</style>

@endsection

@section('breadcrums')
	
	<div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Main Categories</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Main Categories</a>
            </li>
            <li class="breadcrumb-item active">View all
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

<div class="content-body">
    
    <section id="header-footer">
      <div class="row">
        <div class="col-12 mt-1 mb-1">
          <!-- <h4 class="text-uppercase">Category</h4>  -->
          <p>Manage custom boxes expert main categories.</p>
        </div>
      </div>
      @if(!$categories->isEmpty())
        @foreach($categories->chunk(4) as $chunk)
        <div class="row match-height">
          @foreach($chunk as $data)
          <div class="col-xl-3 col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">{{ $data->title }}</h4>
              </div>
              <div class="card-content">
              <!--  <div class="card-body">
                  <h5>Basic Card With Header & Footer</h5>
                </div> -->
                <img class="img-fluid" src="{{ URL::asset('admin/app-assets/images/categories/'.$data->image) }}" alt="Main category image">
              </div>
              <br/>
              <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                <span class="float-left">
                  @if($data->status == 1)
                  <span class="badge border-success border-darken-4 success darken-4 badge-border">Active</span>
                @else
                  <span class="badge border-danger border-darken-4 danger darken-4 round badge-border">Inactive</span>
                @endif
                </span>
                <span class="float-right">
                  <a href="{{ route('admin.main.category.edit', $data->id) }}"><i class="la la-edit"></i> Edit</a>
                </span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @endforeach
      @else
        <div class="row match-height">
          <div class="col-xl-12 col-md-12">
            <hr/>
            <p class="danger darken-4">There are no products to show here...</p>
                
          </div>
        </div>
      @endif
    </section>

</div>

@endsection

@section('script')
@endsection