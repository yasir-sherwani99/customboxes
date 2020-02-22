@extends('admin')

@section('style')

<style>

.pagination {
   justify-content: center;
}

</style>

@endsection

@section('breadcrums')
	
	  <div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Subscribers</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Subscribers List
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

<div class="content-body">
  
  <section class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-head">
          <div class="card-header">
            <h4 class="card-title">All Subscribers</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
          </div>
        </div>
        <div class="card-content">
          <div class="card-body">
            <!-- Task List table -->
            <div class="table-responsive">
              <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 10%;">#</th>
                    <th style="width: 20%;">Date</th>
                    <th style="width: 70%;">Email</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($subscribers as $key => $data)
                  <tr>
                    <td class="text-center">
                        {{ $key+1 }}
                    </td>
                    @php
                      $created = $data->created_at;
                      $created_at = \Carbon\Carbon::parse($created);
                      $subscribing_date = $created_at->toFormattedDateString();
                    @endphp
                    <td>
                        {{ $subscribing_date }}
                    </td>
                    <td>
                        {{ $data->email }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3">{{ $subscribers->links() }}</td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

@endsection

@section('script')
@endsection