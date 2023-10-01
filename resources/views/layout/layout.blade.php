<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href={{ asset('css/portal.css') }}>

</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
            @include('partials.navbar')
        </div><!--//app-header-inner-->

        <div id="app-sidepanel" class="app-sidepanel">
            @include('partials.sidebar')
        </div><!--//app-sidepanel-->

    </header><!--//app-header-->

    <div class="app-wrapper">

        @yield('content')

        @include('partials.footer')

    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src={{ asset('plugins/popper.min.js') }}></script>
    <script src={{ asset('bootstrap/js/bootstrap.min.js') }}></script>

    <!-- Charts JS -->
    <script src={{ asset('plugins/chart.js/chart.min.js') }}></script>
    <script src={{ asset('js/index-charts.js') }}></script>

    <!-- Page Specific JS -->
    <script src={{ asset('js/app.js') }}></script>

</body>

</html>
