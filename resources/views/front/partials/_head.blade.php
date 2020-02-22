<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="Sky IT Services">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('assets/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('assets/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('assets/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ URL::asset('assets/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ URL::asset('assets/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="application-name" content="PackagingXpert">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">  
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('assets/css/skins/skin-demo-24.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/demos/demo-24.css') }}">

    @yield('style')

    <script>
        
        document.onkeydown=function(evt) {
            var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
            if(keyCode == 13) {
                document.search.submit();
            }
        }

    </script>

</head>