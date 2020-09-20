@extends('layouts.app')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <section>
        <div class="hero-wrap js-fullheight">
            <div class="overlay"></div>
            <div id="particles-js"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                    <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                        <img src="{{ asset('assets/client/main-logo.png') }}" alt="main logo" class="img-fluid">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Innovate your
                            <strong>World</strong></h1>
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Dám đổi mới,
                            <strong>Dám đột phá</strong></h1>
                        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                            <a href="#" class="btn btn-primary btn-outline-white px-5 py-3">Khám phá</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-6 text-center heading-section ftco-animate">
                <span class="subheading" >
                    <div class="dot-center"></div>
                </span>
                    <h1 class="mb-4">Innovate <strong>your word</strong></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-justify">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('assets/client/img/icon/setting.png') }}" alt="icon" class="img-fluid">
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading text-center">Về chúng tôi</h3>
                            <p>Mang trên mình sứ mệnh <strong>thế giới trở nên tốt đẹp hơn. </strong>Ontel được thành lập với một đội ngũ nhân sự dày dặn kinh nghiệm về chuyên môn cùng tinh thần tràn đầy nhiệt huyết, tác phong chuyên nghiệp, dám nghĩ dám làm.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-justify">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('assets/client/img/icon/launch.png') }}" alt="icon" class="img-fluid">
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading text-center">Lĩnh vực hoạt động</h3>
                            <p>Tự hào là một trong những đơn vị đột phá trong lĩnh vực kinh doanh các Dịch vụ nội dung số, Mô hình platform về Game, Giáo dục, Media,... đa nền tảng và các dịch vụ GTGT khác.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-justify">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('assets/client/img/icon/link.png') }}" alt="icon" class="img-fluid">
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading text-center">Sản phẩm & dịch vụ</h3>
                            <p>Với phương châm: <strong>Luôn đặt trải nghiệm của khách hàng lên hàng đầu. </strong>Ontel cho ra những sản phẩm & dịch vụ công nghệ cao có nội dung và chất lượng, giao diện đẹp mắt và thân thiện cũng như khả năng tương tác linh hoạt dành cho người dùng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-animate">
        <div class="mt-0 ml-5 mr-5 shadow-lg" style="max-height: 500px; background: linear-gradient(45deg, #ee76ad 0%, #efac78 100%); border-radius: 20px">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <img src="{{ asset('assets/client/img/icon/logo-3.png') }}" alt="logo" class="img-fluid">
                </div>
                <div class="col-md-4 col-sm-12 mt-5 ftco-animate">
                    <h1 class="text-white mt-5"><strong>Vì sao lựa chọn Ontel?</strong></h1>
                    <h4 class="text-white text-justify mt-4">Mang trên mình sứ mệnh <strong>thay đổi thế giới trở nên tốt đẹp hơn, </strong>Ontel được thành lập với đội ngũ nhân sự dày dặn kinh nghiệm về chuyên môn cùng tinh thần tràn đầy nhiệt huyết, tác phong chuyên nghiệp, dám nghĩ dám làm.</h4>
                </div>
            </div>
        </div>
    </section>

    <div style="background-image:url('{{ asset('assets/client/img/images/bg-logo.png') }}'); background-repeat: no-repeat; background-position: top right;">
        <section class="ftco-animate">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12 pt-5 ftco-animate">
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
                    <div class="col-md-7 col-sm-12 pl-5 ftco-animate">
                        <img src="{{ asset('assets/client/img/icon/icon-1.png') }}" alt="icon" class="img-fluid">
                        <h3>A dream you dream alone is only a dream.</h3>
                        <h1><strong>A dream you dream <br>together is reality.</strong></h1>
                        <p><i>- Jonh Lennon</i></p>
                    </div>
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

@section('script')
    <script>
        VANTA.NET({
            el: "#particles-js",
            mouseControls: true,
            touchControls: true,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0xffffff,
            backgroundAlpha: 0,
            points: 15.00,
            maxDistance: 0.00,
            spacing: 15.00
        })
    </script>
@endsection
