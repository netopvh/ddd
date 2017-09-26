<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Sistema de Gerenciamento')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('backend/css/icoomon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/bundle.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->


</head>

<body class="navbar-top">

@include('layout.backend.partials.navbar')

<!-- Page container -->
<div class="page-container" style="">

    <!-- Page content -->
    <div class="page-content">

    @include('layout.backend.partials.sidebar')

    <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-default">

                @yield('page-header')

                @yield('breadcrumb')
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

            @yield('content')

            <!-- Footer -->
                <div class="footer text-muted">
                    @include('layout.backend.partials.footer')
                </div>
                <!-- /footer -->


            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

<!-- Core JS files -->
<script type="text/javascript" src="{{ asset('backend/js/core.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('backend/js/theme-5f12f68147.js') }}"></script>
@stack('scripts-before')

<script type="text/javascript" src="{{ asset('backend/js/bundle-b6b31d9492.js') }}"></script>
@stack('scripts-after')
@include('sweet::alert')
<!-- /theme JS files -->
</body>
</html>
