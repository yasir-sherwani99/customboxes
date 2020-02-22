@extends('admin')

@section('style')

<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" ></script>

<script>

    $(document).ready(function() {
      $('.faq_delete').click(function(){
        if(confirm('Are you sure you want to delete this faq?'))
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
      <h3 class="content-header-title mb-0 d-inline-block">Faqs</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Website Settings</a>
            </li>
            <li class="breadcrumb-item active">Faqs
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="content-header-right col-md-3 col-12">
      <a href="{{ route('admin.faqs.create') }}" title="Create new faq">
        <button class="btn btn-danger btn-sm box-shadow-2 round btn-min-width pull-right" type="button">Add New Faq</button>
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

    <section id="header-footer">
      <div class="row match-height">
        <div class="col-lg-12 col-xl-12">
          <div class="mb-1">
          </div>
          <div id="accordionWrap5" role="tablist" aria-multiselectable="true">
            <div class="card collapse-icon accordion-icon-rotate">
              @foreach($faqs as $key => $value)
              <div id="heading{{ $key }}" class="card-header border-success">
                <a data-toggle="collapse" data-parent="#accordionWrap5" href="#accordion{{ $key }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                aria-controls="accordion{{ $key }}" class="card-title lead success">{{ $value->question }}</a>
                <span class="float-right pr-2">
                  <a href="{{ route('admin.faqs.edit', $value->id) }}" title="Edit Faq"><i class="la la-edit"></i></a>&nbsp;<a href="{{ route('admin.faqs.delete', $value->id) }}" class="faq_delete" title="Delete Faq"><i class="la la-trash"></i></a>
                </span>     
              </div>
              <div id="accordion{{ $key }}" role="tabpanel" aria-labelledby="heading{{ $key }}" class="card-collapse collapse {{ $key == 0 ? 'show' : '' }}"
              aria-expanded="{{ $key == 0 ? 'true' : 'false' }}">
                <div class="card-content">
                  <div class="card-body">
                    {{ $value->answer }}
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

</div>

@endsection

@section('script')
@endsection