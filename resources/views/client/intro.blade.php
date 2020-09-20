@extends('layouts.app')

@section('title')
    <title>Giới thiệu</title>
@endsection

@section('content')
    <section style="background: linear-gradient(45deg, #ee76ad 0%, #efac78 100%); border-radius: 0 0 30px 30px"
             class="pt-5">
        <div class="container pt-5">
            <div class="row" data-scrollax-parent="true">
                <div class="col-md-6 ftco-animate d-flex justify-content-center"
                     data-scrollax=" properties: { translateY: '70%' }">
                    <img src="{{ asset('assets/client/main-logo.png') }}" alt="main logo" class="img-fluid">
                </div>
                <div class="col-md-6 m-auto">
                    <h2 class="text-white" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Innovate your
                        <strong>World</strong></h2>
                    <h2 class="text-white" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Dám đổi mới,
                        <strong>Dám đột phá</strong></h2>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-3">
        <div class="container">
            <small>Giới thiệu</small>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <img src="{{ asset('assets/client/img/icon/logo-gradient.png') }}" class="img-fluid">
                </div>
                <div class="col-sm-12 col-md-8 text-justify">
                    <p><strong>Với mong muốn mang lại những giá trị thiết thực cho khách hàng và là đối tác số 1 trong
                            lĩnh vực kinh doanh dịch vụ VAS,</strong> ONTEL ra đời vào năm 2018 với đội ngũ nhân sự dày
                        dặn kinh nghiệm, tràn trề nhiệt huyết và luôn giữ vững tinh thần dám nghĩ dám làm, dám đổi mới,
                        dám đột phá.
                    </p>
                    <p>Hoạt động trong lĩnh vực kinh doanh các Dịch vụ nội dung số, mô hình Platform về Game, Giáo dục,
                        Media,... đa nền tảng và các dịch vụ GTGT. Chúng tôi hiểu rằng, để phát triển bền vững, giải
                        pháp tất yếu mà mỗi doanh nghiệp cần tập trung thực hiện là chủ động nắm bắt, đổi mới và phát
                        triển các dịch vụ phù hợp đáp ứng nhu cầu thực tế của khách hàng.
                    </p>
                    <h4>Chúng tôi, những thành viên của ONTEL: <br><strong>“DÁM ĐỔI MỚI – DÁM ĐỘT PHÁ”</strong></h4>
                </div>
            </div>
            <div class="row pt-3">
                <div class="table">
                    <table class="m-auto">
                        <tbody class="m-auto">
                        <tr>
                            <td class="bg-secondary text-white">Tên đầy đủ</td>
                            <td><strong>CÔNG TY CỔ PHẦN ONTEL</strong></td>
                        </tr>
                        <tr>
                            <td class="bg-secondary text-white">Tên viết tắt</td>
                            <td><strong>ONTEL.,JSC</strong></td>
                        </tr>
                        <tr>
                            <td class="bg-secondary text-white">Mã số thuế</td>
                            <td><strong>0108567789</strong></td>
                        </tr>
                        <tr>
                            <td class="bg-secondary text-white">Ngày thành lập</td>
                            <td><strong>28/12/2018</strong></td>
                        </tr>
                        <tr>
                            <td class="bg-secondary text-white">Địa chỉ trụ sở chính</td>
                            <td><strong>Lô 85, TT4 Sông Đà, Phường Mỹ Đình 1, Quận Nam Từ Liêm, Thành phố Hà Nội, Việt Nam.</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <hr>
            <small>Tầm nhìn & Sứ mệnh</small>
            <div class="text-center pt-5">
                <img src="{{ asset('assets/client/img/icon/text-1.png') }}" class="img-fluid">
                <h4>Mang lại những giá trị thiết thực cho khách hàng và là đối tác số 1 trong lĩnh vực kinh doanh dịch vụ VAS.</h4>
            </div>
            <div class="text-center pt-5">
                <img src="{{ asset('assets/client/img/icon/text-2.png') }}" class="img-fluid">
                <h4>Đem đến cho người dùng những trải nghiệm thú vị về các dịch vụ trực tuyến. giúp khách hàng tiếp cận tốt nhất với các dịch vụ trực tuyến công nghệ mới.</h4>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <hr>
            <small>Văn hóa ONTEL</small>
            <div class="pt-5">
                <img src="{{ asset('assets/client/img/icon/vh.png') }}" class="img-fluid">
            </div>
        </div>
    </section>
@endsection
