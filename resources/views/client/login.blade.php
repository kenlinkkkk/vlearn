<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/client/favicon.png') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">
    <link href="{{ asset('assets/client/css/open-iconic-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/jquery.timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/icomoon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/util.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/main.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.header')
<section class="ftco-section">
    <div class="hero-wrap js-fullheight">
        <div class="row">
            <div class="col-md-4 col-sm-12"></div>
            <div class="col-md-4 col-sm-12 card">
                <div class="card-body">
                    <form method="POST" action="{{ route('home.postLogin') }}">
                        @csrf
                        <div class="form-group">
                            <label for="msisdn">Số điện thoại</label>
                            <input type="text" name="msisdn" class="form-control" placeholder="09232.....">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12"></div>
        </div>
    </div>
</section>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>
<script src="{{ asset('assets/client/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/client/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/client/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/client/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/client/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/client/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/client/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/client/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/client/js/aos.js') }}"></script>
<script src="{{ asset('assets/client/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/client/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/client/js/scrollax.min.js') }}"></script>
<script src="{{ asset('assets/client/js/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/client/js/main.js') }}"></script>
<script src="{{ asset('assets/client/js/main2.js') }}"></script>

<script>
    $(document).ready(function() {
        $(window).on('hashchange', function(e){
            history.replaceState ("", document.title, e.originalEvent.oldURL);
        });
    })
</script>
</body>
</html>
