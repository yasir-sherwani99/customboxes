<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('admin.partials.auth_head')

<body class="vertical-layout vertical-menu-modern 1-column bg-white menu-expanded blank-page"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10">
              
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

              @if (Session::has('alert'))
              <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh Snap!</strong> {{ Session::get('alert') }}
              </div>
              @endif

              <div class="card border-grey border-lighten-3 py-1 m-0">
                
                <div class="card-title text-center">
                  <div class="row">
                    <div class="col-12">
                      <a href="{{ url('/') }}"><img src="{{ URL::asset('assets/images/logos/Logo_new_others.png') }}" alt="CustomBoxesExpert Logo" class="img-fluid"></a>
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                     <span>Login with CustomBoxesExpert</span> 
                  </h6>
                </div>

                <div class="card-content">
                  <div class="text-center">
                    <h4 class="text-bold-600">Admin Login</h4>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.login.store') }}" novalidate>
                    {{ csrf_field() }}
                    <div class="form-body">  
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control" id="user-name" required data-validation-required-message="- Username field is required." placeholder="Username" name="email">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control" id="user-password" required data-validation-required-message="- Password field is required." placeholder="Password" name="password">
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-sm-left">
                          
                        </div>
                        <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                      </div>
                      <button type="submit" class="btn btn-secondary btn-block box-shadow-2 white">
                        <span class="loading-spinner" style="display: none;"><i class="la la-refresh spinner"></i>&nbsp;Loading... Please wait.</span>
                        <span class="without-load"><i class="ft-unlock"></i>&nbsp;Login</span>
                      </button>
                    </div>
                    </form>
                  </div>
                  <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                   <!-- <span>New to Modern ?</span> -->
                  </p>
                  <div class="card-body text-center">
                    2019 &copy; All Copyright Reserved to <a href="http://customboxesexpert.com/" target="_blank">CustomBoxesExpert.</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('admin.partials.auth_script')

</body>
</html>