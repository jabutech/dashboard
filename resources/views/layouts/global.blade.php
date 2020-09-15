<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JNE Medan | @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/summernote/summernote-bs4.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/jqvmap/jqvmap.min.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('links')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/logo-jne.png') }}" alt="AdminLTE Logo" class="brand-image"
            style="opacity: .8">
        <span class="brand-text font-weight-light">JNE Medan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if(Auth::user()->foto_profil)
            <img src="{{ asset('storage/'. Auth::user()->foto_profil) }}" class="user-image"
                alt="User Image">
            @else
            <img src="{{ asset('assets/user.png') }}" class="user-image"
                alt="User Image">
            @endif
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
        </div>

        <!-- Sidebar Menu -->
        <x-layouts.sidebar></x-layouts.sidebar>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title')</h1>
            </div>
        </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
            @yield('content')
            </section>
        </div>
        </div>
    </section>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong><a href="#">IT Development JNE Medan</a> </strong> &copy; 2020 <script>new Date().getFullYear()>2013&&document.write("-"+new Date().getFullYear());</script> All rights
        reserved.
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    </div>
    <!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/adminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/adminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/adminLTE/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/adminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/adminLTE/plugins/moment/moment.min.js') }}"></script>

<script src="{{ asset('assets/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/adminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ asset('assets/adminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('assets/adminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/adminLTE/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/adminLTE/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/adminLTE/dist/js/demo.js') }}"></script>
@stack('scripts')
</body>
</html>
