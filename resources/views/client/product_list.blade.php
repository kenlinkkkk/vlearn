@extends('layouts.app')

@section('title')
    <title>Sản phẩm</title>
@endsection

@section('content')
    <section class="ftco-section" style="background-image:url('{{ asset('assets/client/img/images/bg-logo.png') }}'); background-repeat: no-repeat; background-position: center right;">
        <div class="container">
            <img src="{{ asset('assets/client/img/icon/icon-1.png') }}" alt="icon" class="img-fluid">
            <h1><b>DỊCH VỤ</b></h1>
            <hr style="width: 30%;">
            <div class="row">
                @foreach($products as $item)
                    <div class="col-md-4">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <img src="{{ asset($item->picture) }}" class="m-auto img-fluid">
                                <div class="text-justify pt-3">
                                    <strong class="text-justify">{{ $item->title }}</strong>
                                </div>
                                <div class="container-contact2-form-btn pt-3">
                                    <div class="wrap-contact2-form-btn">
                                        <div class="contact2-form-bgbtn"></div>
                                        <a href="{{ route('home.cproduct.product_detail', [$item->short_tag]) }}" class="contact2-form-btn"><strong>Xem thêm</strong></a>
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
