<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bakas Inventory | {{ $title }} </title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Bakas - Warehouse">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">
    <script src="{{ asset('js/tables.js') }}"></script>

</head>
<header class="app-header fixed-top noprint">

    @include('partials.header')
    <!--//app-header-->
    <div id=" app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            @role('admin')
                @include('partials.navbar_admin')
            @endrole
            @role('kasir')
                @include('partials.navbar_kasir')
            @endrole
        </div>
    </div>
    <!--//app-sidepanel-->
</header>

<body class="app">

    <div class="app-wrapper">

        @yield('content')
        <!--//app-content-->

        <footer class="app-footer noprint">
            <div class="container text-center py-3 noprint">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright noprint">Designed with <i class="fas fa-truck" style="color: #fb866a;"></i>
                    by
                    Bakas Warehouse</small>
            </div>
        </footer>
        <!--//app-footer-->

    </div>
    <!--//app-wrapper-->


    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script>
    <script src="assets/js/index-charts.js"></script>



    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>
