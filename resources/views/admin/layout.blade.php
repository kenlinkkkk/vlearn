<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/client/favicon.png') }}"/>

    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="#" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/client/main-logo.png') }}" alt="" height="30">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/client/header-logo.png') }}" alt="" height="40">
                        </span>
                    </a>

                    <a href="#" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/client/main-logo.png') }}" alt="" height="30">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('assets/client/header-logo.png') }}" alt="" height="40">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="bx bx-search-alt"></span>
                    </div>
                </form>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{--language button--}}
{{--                @include('admin.layout.language')--}}
                {{--language button--}}

{{--                @include('admin.layout.service')--}}

                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
                </div>

{{--                @include('admin.layout.noti')--}}

                @include('admin.layout.user')
            </div>
        </div>
    </header>
    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.layout.navbar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        @include('admin.layout.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/admin/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script>
    @if (session('success'))
    swal.fire({
        type: "success",
        title: "Cập nhật thành công",
        showConfirmButton: !1,
        timer: 1500
    });
    @endif
    @if (session('error'))
    swal.fire({
        type: "error",
        title: "Cập nhật thất bại",
        showConfirmButton: !1,
        timer: 1500
    });
    @endif
</script>
@yield('script')
</body>
</html>
