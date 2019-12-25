@extends('admin')

@section('style')

<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" ></script>
<style>

.pagination {
   justify-content: center;
}

</style>

@endsection

@section('breadcrums')
	
	<div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Blog Categories</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Blog</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Blog Categories</a>
            </li>
            <li class="breadcrumb-item active">View all
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right col-md-3 col-12">
      <a href="{{ route('admin.blog_category.create') }}" title="Create new announcement">
        <button class="btn btn-danger btn-sm box-shadow-2 round btn-min-width pull-right" type="button">New Blog Category</button>
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
    <strong>Well done!</strong> <span class="text-bold-600">{{ Session::get('success') }}</span>.
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

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Blog Categories</h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body">
            <p>View all blog categories.</p>
          </div>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="black">
                <tr style="background-color: #F4F5FA;">
                  <th class="text-center" style="width: 10%;">#</th>
                  <th style="width: 80%;">Title</th>
                  <th style="width: 10%;" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $key => $category)
                <tr>
                  <th scope="row" class="text-center">{{ $key+1 }}</th>
                  <td>{{ $category->title }}</td>
                  <td class="text-center">
                    <span class="dropdown">
                      <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false" class="btn btn-info btn-sm dropdown-toggle"><i class="la la-cog font-medium-1"></i></button>
                      <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                        <a href="{{ route('admin.blog_category.edit', $category->id) }}" class="dropdown-item font-small-3"><i class="la la-edit font-medium-2"></i> Edit</a>
                      <!--  <a href="#" class="dropdown-item font-small-3"><i class="la la-eye font-medium-2"></i> Status</a> -->
                      </span>
                    </span>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3">{{ $categories->links() }}</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

@section('script')
@endsection