<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('admin.partials._head')

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns"> 

@include('admin.partials._fixed-top')

@include('admin.partials._side-bar')

<div class="app-content content">
    <div class="content-wrapper">
    	<div class="content-header row">
      	
          @yield('breadcrums')
        
      </div>		
      
      @yield('content')	

    </div>
</div>

@include('admin.partials._footer')

@include('admin.partials._script')

</body>
</html>      	