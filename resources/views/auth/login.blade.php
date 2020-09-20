<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Đăng nhập</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Đăng nhập để tiếp tục.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('assets/admin/images/profile-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="#">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ asset('assets/admin/images/logo.svg') }}" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Tài khoản</label>
                                    <input type="text" class="form-control" id="username" name="user_name" value="{{ old('user_name') }}" placeholder="Nhập tài khoản..." required>
                                    @error('username')
                                    <div class="invalid-feedback">Sai thông tin tài khoản</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Mật khẩu</label>
                                    <input type="password" class="form-control" id="userpassword" name="password" placeholder="Nhập mật khẩu..." required>
                                    @error('password')
                                    <div class="invalid-feedback">Sai mật khẩu tài khoản</div>
                                    @enderror
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Đăng nhập</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/admin/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
</body>

</html>
