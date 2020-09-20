@extends('layouts.app')

@section('title')
    <title>Liên hệ</title>
@endsection

@section('content')
    <div style="background-image:url('{{ asset('assets/client/img/images/bg-logo.png') }}'); background-repeat: no-repeat; background-position: top right;">
        <section class="ftco-section ftco-animate">
            <div class="container">
                <div class="d-inline-block">
                    <img src="{{ asset('assets/client/img/icon/icon-1.png') }}" alt="icon" class="img-fluid">
                    <h1 class="pl-3"><b>LIÊN HỆ</b></h1>
                </div>
            </div>
            <div class="container d-flex">
                <div class="col-md-5 col-sm-12 mt-5 ftco-animate">
                    <form class="contact2-form validate-form" method="post" action="#">
                        <div class="wrap-input2 validate-input" data-validate="Name is required">
                            <input class="input2" type="text" name="name">
                            <span class="focus-input2" data-placeholder="Họ tên "></span>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="wrap-input2 validate-input" data-validate="Name is required">
                                    <input class="input2" type="text" name="phone">
                                    <span class="focus-input2" data-placeholder="Điện thoại "></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                    <input class="input2" type="text" name="email">
                                    <span class="focus-input2" data-placeholder="Email"></span>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input2" type="text" name="title">
                            <span class="focus-input2" data-placeholder="Chủ đề(*)"></span>
                        </div>
                        <div class="wrap-input2 validate-input" data-validate = "Message is required">
                            <textarea class="input2" name="message"></textarea>
                            <span class="focus-input2" data-placeholder="Tin nhắn"></span>
                        </div>

                        <div class="container-contact2-form-btn">
                            <div class="wrap-contact2-form-btn">
                                <div class="contact2-form-bgbtn"></div>
                                <button class="contact2-form-btn">
                                    Gửi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-sm-12 mt-5 ftco-animate pt-4">
                    <h3>A dream you dream alone is only a dream.</h3>
                    <h1><strong>A dream you dream <br>together is reality.</strong></h1>
                    <p><i>- Jonh Lennon</i></p>
                </div>
            </div>
        </section>

        <section class="ftco-section">
            <div class="container ftco-animate">
                <img src="{{ asset('assets/client/img/images/map.png') }}" alt="icon" class="img-fluid">
            </div>
        </section>
    </div>
@endsection
