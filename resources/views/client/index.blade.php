@extends('welcome')

@section('title')
    {{ 'Packaging Expert | Client Dashboard' }}
@endsection

@section('keywords')
    {{ 'Packaging Expert | Client Dashboard' }}
@endsection

@section('description')
    {{ 'Packaging Expert | Client Dashboard' }}
@endsection

@section('style')

<script src="{{ URL::asset('admin/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>

<script>

$(document).ready(function(){

    $("#billing_address").click(function(){
        $("#edit_billing_address").show();        
    });

    $("#shipping_address").click(function(){
        $("#edit_shipping_address").show();        
    });

});

</script>

<style>

.btn-outline-primary-2 {
    border: 2px solid #ff726f !important;
    color: #ff726f !important;
}
.btn-outline-primary-2:hover {
    background-color: #ff726f !important;
    color: #ffffff !important;
}

</style>

@endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span style="color: #0A72E8 !important;">Dashboard</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    @if (count($errors) > 0)
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</b>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
            </div>
        </div>
    </div>
    <br/>
    <script>
    /*
        $(document).ready(function(){
            setTimeout(function(){ toastr.error('You must fill in all of the required fields!', 'Vista Network Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
        }); */

    </script>
    @endif

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                @if (Session::has('success'))
                <div class="alert alert-icon-left alert-arrow-left alert-success alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Well done!</strong> <span style="font-weight: 500;">{{ Session::get('success') }}</span>
                </div>
                <br/>
                <script>
                    /*
                    $(document).ready(function(){
                        setTimeout(function(){ toastr.success("{{ Session::get('success') }}", 'Custom Boxes Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
                    });
                    */
                </script>
                @endif
                @if (Session::has('alert'))
                <div class="alert alert-icon-left alert-arrow-left alert-warning alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Oh Snap!</strong> <span style="font-weight: 500;">{{ Session::get('alert') }}</span>
                </div>
                <br/>
                <script>
                    /*
                    $(document).ready(function(){
                        setTimeout(function(){ toastr.success("{{ Session::get('success') }}", 'Custom Boxes Says', {"hideDuration": 500, positionClass: 'toast-top-right'}); }, 2000);
                    });
                    */
                </script>
                @endif
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                            </li>
                        <!--    <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Quotations</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" id="tab-bill-address-link" data-toggle="tab" href="#tab-bill-address" role="tab" aria-controls="tab-bill-address" aria-selected="false">Billing Adresses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-ship-address-link" data-toggle="tab" href="#tab-ship-address" role="tab" aria-controls="tab-ship-address" aria-selected="false">Shipping Adresses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-password-link" data-toggle="tab" href="#tab-password" role="tab" aria-controls="tab-password" aria-selected="false">Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                      Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Hello <span class="font-weight-normal text-dark">{{ Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}</span> (not <span class="font-weight-normal text-dark">User</span>? 
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('signout-form').submit();">
                                      Sign Out
                                    </a>)
                                    <form id="signout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                    </form> 
                                </p>
                                <h4 class="heading-title text-left" style="font-weight: 600;">Welcome to Custom Boxes Expert</h4>
                                <p>
                                    Our boxes are made from various stock obtained from recyclable to ribbed and cardboard sheets. It seems very easy to make a box. But there are number of steps that being followed for the preparation of each box. Initiating from scanning, assembling, printing, die cutting, lamination and pasting, all these steps require 100% perfection to make it into a box from sheets. Our boxes are manufactured in houses to ensure the 100% quality and promising care to fulfill the requirement of our valuable customer. Our products are eco-friendly because we create them from pure recyclable material to maintain healthy and green environment.
                                </p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <p>No order has been made yet.</p>
                                <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- .End .tab-pane -->


                            <div class="tab-pane fade" id="tab-bill-address" role="tabpanel" aria-labelledby="tab-bill-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Billing Address</h3><!-- End .card-title -->

                                                <p>C/O<br>
                                                {{ isset($billing->company) ? $billing->company : '' }}<br>
                                                {{ isset($billing->first_name) ? $billing->first_name : '' }}&nbsp;{{ isset($billing->last_name) ? $billing->last_name : '' }}<br>
                                                {{ isset($billing->street_address) ? $billing->street_address : '' }}<br>
                                                {{ isset($billing->city) ? $billing->city : '' }}, {{ isset($billing->state) ? $billing->state : '' }}&nbsp;{{ isset($billing->zip) ? $billing->zip : '' }}<br>
                                                {{ isset($billing->phone) ? $billing->phone : '' }}<br>
                                                {{ isset($billing->email) ? $billing->email : '' }}<br>
                                                <a href="#" id="billing_address">Edit <i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6" id="edit_billing_address" style="display: none;">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Update Billing Address</h3><!-- End .card-title -->
                                                <form action="{{ route('billing_address.update', $billing->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('put') }}
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>First Name *</label>
                                                        <input type="text" class="form-control" name="first_name" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Last Name *</label>
                                                        <input type="text" class="form-control" name="last_name" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Phone *</label>
                                                        <input type="text" class="form-control" name="phone" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Email *</label>
                                                        <input type="email" class="form-control" name="email" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Company</label>
                                                        <input type="text" class="form-control" name="company" required>
                                                    </div><!-- End .col-sm-12 -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Street Address *</label>
                                                        <input type="text" class="form-control" name="address" required>
                                                    </div><!-- End .col-sm-12 -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>City *</label>
                                                        <input type="text" class="form-control" name="city" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>State *</label>
                                                        <input type="text" class="form-control" name="state" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Zip *</label>
                                                        <input type="text" class="form-control" name="zip" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Country *</label>
                                                        <input type="text" class="form-control" name="country" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <button type="submit" class="btn btn-outline-primary-2">
                                                            <span>UPDATE</span>
                                                            <i class="icon-long-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-ship-address" role="tabpanel" aria-labelledby="tab-ship-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

                                                <p>C/O<br>
                                                {{ isset($shipping->company) ? $shipping->company : '' }}<br>
                                                {{ isset($shipping->first_name) ? $shipping->first_name : '' }}&nbsp;{{ isset($shipping->last_name) ? $shipping->last_name : '' }}<br>
                                                {{ isset($shipping->street_address) ? $shipping->street_address : '' }}<br>
                                                {{ isset($shipping->city) ? $shipping->city : '' }}, {{ isset($shipping->state) ? $shipping->state : '' }}&nbsp;{{ isset($shipping->zip) ? $shipping->zip : '' }}<br>
                                                {{ isset($shipping->phone) ? $shipping->phone : '' }}<br>
                                                {{ isset($shipping->email) ? $shipping->email : '' }}<br>
                                                <a href="#" id="shipping_address">Edit <i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6" id="edit_shipping_address" style="display: none;">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Update Shipping Address</h3><!-- End .card-title -->
                                                <form action="{{ route('shipping_address.update', $shipping->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('put') }}
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>First Name *</label>
                                                        <input type="text" class="form-control" name="first_name" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Last Name *</label>
                                                        <input type="text" class="form-control" name="last_name" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Phone *</label>
                                                        <input type="text" class="form-control" name="phone" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Email *</label>
                                                        <input type="email" class="form-control" name="email" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Company</label>
                                                        <input type="text" class="form-control" name="company" required>
                                                    </div><!-- End .col-sm-12 -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Street Address *</label>
                                                        <input type="text" class="form-control" name="address" required>
                                                    </div><!-- End .col-sm-12 -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>City *</label>
                                                        <input type="text" class="form-control" name="city" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>State *</label>
                                                        <input type="text" class="form-control" name="state" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Zip *</label>
                                                        <input type="text" class="form-control" name="zip" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Country *</label>
                                                        <input type="text" class="form-control" name="country" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <button type="submit" class="btn btn-outline-primary-2">
                                                            <span>UPDATE</span>
                                                            <i class="icon-long-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="{{ route('profile.update', $user->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Display Name *</label>
                                            <input type="text" class="form-control" disabled="">
                                            <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-sm-12">
                                            <label>Email address *</label>
                                            <input type="email" class="form-control" readonly="" value="{{ $user->email }}">
                                        </div>
                                    </div>

                            <!--        <label>Current password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" class="form-control">

                                    <label>Confirm new password</label>
                                    <input type="password" class="form-control mb-2">  -->

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-password" role="tabpanel" aria-labelledby="tab-password-link">
                                <form action="{{ route('password.update', $user->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Current password (leave blank to leave unchanged)</label>
                                            <input type="password" name="passwordold" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>New password (leave blank to leave unchanged)</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Confirm new password (leave blank to leave unchanged)</label>
                                            <input type="password" name="password_confirmation" class="form-control" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>    
                            </div>  
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
    @include('front.partials._quote')
</main><!-- End .main -->

@endsection

@section('script')
@endsection
