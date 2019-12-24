@extends('welcome')

@section('style')
@endsection

@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg-new-4.jpg')">
        <div class="container">
            <div class="form-box">
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
                @endif
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            <form method="post" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email-2">Email *</label>
                                            <input type="email" class="form-control" id="email-2" name="email" required>
                                        </div><!-- End .form-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="password-2">Password *</label>
                                            <input type="password" class="form-control" id="password-2" name="password" required>
                                        </div><!-- End .form-group -->
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>LOG IN</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                    </div><!-- End .custom-checkbox -->

                                    <a href="#" class="forgot-link">Forgot Your Password?</a>
                                </div><!-- End .form-footer -->
                            </form>
                            <div class="form-choice">
                              <!--  <p class="text-center">New User?</p>
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-user"></i>
                                            Register
                                        </a>
                                    </div>
                                </div> --><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                            <form method="post" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first_name">First Name *</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                                        </div><!-- End .form-group -->
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last_name">Last Name *</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                                        </div><!-- End .form-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div><!-- End .form-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password">Password *</label>
                                            <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                                            <small style="color: #B0BEC5;">Password must contain at least 6 characters</small>
                                        </div><!-- End .form-group -->
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password *</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        </div><!-- End .form-group -->
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                        <label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-footer -->
                            </form>
                            <div class="form-choice">
                              <!--  <p class="text-center">Already have an account?</p>
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-user"></i>
                                            Login
                                        </a>
                                    </div>
                                </div> --><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->

@endsection

@section('script')
@endsection