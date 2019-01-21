<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/images/favicon.png")}}">--}}
    <title>{{ auth()->user()->name }}</title>
    <!-- Custom CSS -->
    <link href="{{ asset("assets/libs/flot/css/float-chart.css") }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset("dist/css/style.min.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/css/validationEngine.jquery.css")}}">

@yield("styles")

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- navbar starts here -->
@include("partials.navbar")
<!-- navbar ends here -->


        <!-- Main sidebar -->
    @include("partials.sidebar")
    <!-- /main sidebar -->

        <!-- Main content -->
    <div class="page-wrapper">

        @include('partials.message')


        <!-- Content area -->
        @yield("content")
        <!-- /content area -->
        </div>



    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<script src="{{ asset("assets/libs/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset("assets/libs/popper.js/dist/umd/popper.min.js")}}"></script>
<script src="{{ asset("assets/libs/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<script src="{{ asset("assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js")}}"></script>
<script src="{{ asset("assets/extra-libs/sparkline/sparkline.js")}}"></script>
<!--Wave Effects -->
<script src="{{ asset("dist/js/waves.js")}}"></script>
<!--Menu sidebar -->
<script src="{{ asset("dist/js/sidebarmenu.js")}}"></script>
<!--Custom JavaScript -->
<script src="{{ asset("dist/js/custom.min.js")}}"></script>
<!--This page validationEngine -->
<script src="{{ asset("assets/js/jquery.validationEngine.js") }}"></script>
<script src="{{ asset("assets/js/jquery.validationEngine-en.js") }}"></script>
<script src="{{ asset("assets/js/validateform.js") }}"></script>

@stack("scripts")
</body>
</html>
