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
      <h3 class="content-header-title mb-0 d-inline-block">Quotations</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Quotation</a>
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
  
  <section class="basic-form-layouts">		
	  <div class="row">
      <div id="recent-sales" class="col-12 col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title black">Client Quotations</h4>
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
                    <th class="border-top-0" style="width: 80%;">Client Details</th>
                    <th class="border-top-0 text-left" style="width: 10%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(!$quotations->isEmpty())
                  @foreach($quotations as $key => $quote)   
                  <tr>
                    <td class="text-truncate text-center" style="vertical-align: middle;">{{ $key+1 }}</td>
                    <td class="text-truncate" style="vertical-align: middle;">
                      {{ $quote->full_name }}
                      <br/>
                      {{ $quote->email }}
                    </td> 
                    <td class="text-left" style="vertical-align: middle;">
                      <span class="dropdown">
                        <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info btn-sm dropdown-toggle"><i class="la la-cog font-medium-1"></i></button>
                        <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                            <a href="{{ route('admin.quotation.show', $quote->id) }}" class="dropdown-item font-small-3"><i class="la la-eye font-medium-2"></i> View Details</a>
                          <!--  <a href="#" class="dropdown-item font-small-3"><i class="la la-eye font-medium-2"></i> Status</a> -->
                          </span>
                      </span>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                      <td colspan="3">There is no quotation to show here...</td>
                  </tr>
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                      <td colspan="3">{{ $quotations->links() }}</td>
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