<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | {{ config('app.name', 'Halfordcare.com') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- favicon --}}

<!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- loading css -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/Loading.css')}}">

    @stack('css')
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Pace Loading -->
{{--    <script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>--}}
{{--    <link rel="stylesheet" href="{{asset('assets/plugins/pace/pace-theme-default.min.css')}}">--}}
<!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{--    <script src="{{asset('assets/dist/js/CommonReference.js')}}"></script>--}}

    <!-- Sweet Alert2 -->
    <script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.all.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}">
    <!-- Knockout JS -->
{{--    <script src="{{asset('assets/dist/js/knockout-3.5.1.js')}}"></script>--}}



    <style>.content-header{ padding: 5px .5rem;}</style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('template.navbar')
    <!-- /.navbar -->
    <div class="col-sm-12" id="loadingDiv" style="display: none;">
        <div class="cssload-preloader cssload-loading">
            <span class="cssload-slice"></span>
            <span class="cssload-slice"></span>
            <span class="cssload-slice"></span>
            <span class="cssload-slice"></span>
            <span class="cssload-slice"></span>
            <span class="cssload-slice"></span>
        </div>
    </div>
    <!-- Main Sidebar Container -->
    @include('template.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content_header')
        </section>
        <!-- Content Header (Page header) end -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            @yield('content')
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('template.footer')
</div>
<!-- ./wrapper -->

<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>

{{--<script src="{{ mix('js/app.js') }}"></script>--}}
{{--<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>--}}
@stack('scripts')
</body>
</html>
