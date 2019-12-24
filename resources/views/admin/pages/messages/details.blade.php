@extends('admin')

@section('style')
@endsection

@section('breadcrums')
	
	  <div class="content-header-left col-md-9 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Messages</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Settings</a>
            </li>
            <li class="breadcrumb-item"><a href="javascript:;">Messages</a>
            </li>
            <li class="breadcrumb-item active">Details
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
  
  <section class="card">
    <div id="invoice-template" class="card-body">
      <!-- Invoice Company Details -->
      <div id="invoice-company-details" class="row">
        <div class="col-md-6 col-sm-12 text-center text-md-left">
          <div class="media">
            <img src="{{ URL::asset('assets/images/logos/Logo_new_others.png') }}" class="footer-logo" alt="CustomBoxesExpert Logo">
          <!--  <div class="media-body">
              <ul class="ml-2 px-0 list-unstyled">
                <li class="text-bold-800">Modern Creative Studio</li>
                <li>4025 Oak Avenue,</li>
                <li>Melbourne,</li>
                <li>Florida 32940,</li>
                <li>USA</li>
              </ul>
            </div> -->
          </div>
        </div>
        <div class="col-md-6 col-sm-12 text-center text-md-right">
          <h2>MESSAGES</h2>
        <!--  <p class="pb-3"># </p>
          <ul class="px-0 list-unstyled">
            <li>Balance Due</li>
            <li class="lead text-bold-800">$ 12,000.00</li>
          </ul> -->
        </div>
      </div>
      <!--/ Invoice Company Details -->
      <!-- Invoice Customer Details -->
      <div id="invoice-customer-details" class="row pt-2">
        <div class="col-sm-12 text-center text-md-left">
          <p class="text-muted">From</p>
        </div>
        <div class="col-md-12 col-sm-12 text-center text-md-left">
          @php
              $created = $message->created_at;
              $created_at = \Carbon\Carbon::parse($created);
              $message_date = $created_at->toFormattedDateString();
          @endphp
          <ul class="px-0 list-unstyled">
            <li class="text-bold-800">Mr. {{ $message->full_name }}</li>
            <li>{{ $message->email }}</li>
            <li>{{ $message_date }}</li>
          </ul>
        </div>
      </div>
      <!--/ Invoice Customer Details -->
      <!-- Invoice Items Details -->
      <div id="invoice-items-details" class="pt-2">
        <div class="row">
          <div class="col-md-12">
            <label class="text-bold-600">Subject:</label>
            {{ isset($message->subject) ? $message->subject : 'N/A' }}
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-12">
            <label class="text-bold-600">Message:</label>
            <br/>
            {{ isset($message->message) ? $message->message : 'N/A' }}
          </div>
        </div>
      </div>
    </div>
  </section>
 
</div>

@endsection

@section('script')
@endsection