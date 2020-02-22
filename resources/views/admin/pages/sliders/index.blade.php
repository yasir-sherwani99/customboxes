@extends('admin')

@section('style')

<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" ></script>
<script>

    $(document).ready(function() {
      $('.slider_delete').click(function(){
        if(confirm('Are you sure you want to delete this slider?'))
        { 
          return true; 
        }else{
          return false;
        }
      });
    });

</script>

<style>

.pagination {
   justify-content: center;
}

</style>

@endsection

@section('breadcrums')
	
	  <div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Sliders</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Website Settings</a>
            </li>
            <li class="breadcrumb-item active">Sliders
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right col-md-3 col-12">
      <a href="{{ route('admin.slider.create') }}" title="Add new slide image">
        <button class="btn btn-danger btn-sm box-shadow-2 round btn-min-width pull-right" type="button">Add New Slider</button>
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
  
  <section class="basic-form-layouts">		
	  <div class="row">
      <div id="recent-sales" class="col-12 col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title black">Slider Details - Home Page Slider</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              
            </div>
          </div>
          <div class="card-content mt-1">
            <div class="table-responsive">
              <table id="recent-orders" class="table table-hover table-xl mb-0">
                <thead>
                  <tr>
                    <th class="border-top-0 text-center" style="width: 10%;">#</th>
                    <th class="border-top-0" style="width: 70%;">Picture</th>
                    <th class="border-top-0 text-center" style="width: 10%;">Visible</th>
                    <th class="border-top-0 text-center" style="width: 10%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(!$sliders->isEmpty())
                  @foreach($sliders as $key => $slider)   
                  <tr>
                    <td class="text-truncate text-center" style="vertical-align: middle;">{{ $key+1 }}</td>
                    <td class="text-truncate" style="vertical-align: middle;">
                      <img src="{{ URL::asset('admin/app-assets/images/slider/'.$slider->image) }}" style="width: 250px; height: 87px;" class="img-thumbnail">
                    </td>
                    <td class="text-truncate text-center" style="vertical-align: middle;">
                      @if($slider->status == 1)
                        <i class="la la-check text-bold-600 success darken-4"></i>
                      @else
                        <i class="la la-close text-bold-600 danger darken-4"></i>
                      @endif
                    </td> 
                    <td class="text-center" style="vertical-align: middle;">
                      <span class="dropdown">
                        <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info btn-sm dropdown-toggle"><i class="la la-cog font-medium-1"></i></button>
                        <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="dropdown-item font-small-3"><i class="la la-edit font-medium-2"></i> Edit Slider</a>
                            <a href="{{ route('admin.slider.delete', $slider->id) }}" class="dropdown-item font-small-3 slider_delete"><i class="la la-trash font-medium-2"></i> Delete Slider</a> 
                          </span>
                      </span>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                      <td colspan="4">There is no slider to show here...</td>
                  </tr>
                  @endif
                </tbody>
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