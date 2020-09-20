@extends('layouts.app')

@section('title')
    <title>Tuyển dụng</title>
@endsection

@section('content')
    <section class="ftco-section" style="background-image:url('{{ asset('assets/client/img/images/bg-logo.png') }}'); background-repeat: no-repeat; background-position: center right;">
        <div class="container">
            <img src="{{ asset('assets/client/img/icon/icon-1.png') }}" alt="icon" class="img-fluid">
            <h1><b>TUYỂN DỤNG</b></h1>
            <hr style="width: 30%;">
            <div class="text-justify pt-4 pb-4">
                <h5>- Bạn đang băn khoăn không biết nên làm gì khi chán nản ? Bạn cần những ứng dụng để phục vụ các nhu cầu của bản thân?</h5>
                <h5>-  Bạn đam mê công nghệ, thích sáng tạo, muốn khẳng định bản thân, mang lại nhiều lợi ích cho xã hội.</h5>
                <br>
                <h5><strong>Hãy trải nghiệm ngay các dịch vụ của chúng tôi và ứng tuyển vào những jobs cực kỳ hấp dẫn.</strong></h5>
            </div>
            <div class="row">
                @foreach($recruitments as $item)
                    <div class="col-md-4">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <img src="{{ asset($item->picture) }}" class="m-auto img-fluid">
                                <div class="text-center pt-3">
                                    <h4><strong>{{ $item->position }}</strong></h4>
                                </div>
                                <div class="text-justify pt-3">
                                    <p>Số lượng: {{ $item->quantity }}</p>
                                    <p>Ngày hết hạn: {{ $item->end_time }}</p>
                                </div>
                                <div class="container-contact2-form-btn pt-3">
                                    <div class="wrap-contact2-form-btn">
                                        <div class="contact2-form-bgbtn"></div>
                                        <a href="{{ route('home.crecruitment.recruitment_detail', [$item->short_tag]) }}" class="contact2-form-btn"><strong>Xem thêm</strong></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
