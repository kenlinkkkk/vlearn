@extends('layouts.app')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <section>
        <div class="hero-wrap js-fullheight">
            <div class="container-fluid p-0">
                <img src="{{ asset('assets/client/img/images/image-1.png') }}" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="ftco-animate" id="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <img src="{{ asset('assets/client/img/images/logo.png') }}" class="img-fluid">
                </div>
                <div class="col-md-9 col-sm-6">
                    <div class="m-5 text-justify">
                        <h3 class="m-auto"><strong>Dịch vụ Vlearn - </strong>Kết nối tri thức mọi lúc mọi nơi là nơi dịch giúp các thuê bao
                            đăng ký dịch vụ tham gia các khóa học, bài giảng đa dạng chủ đề, lĩnh vực, cấp độ từ các chuyên
                            gia hàng đầu trên mô hình khóa học trực tuyến.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-animate" id="package">
        <div class="container">
            <h2 class="text-center">GÓI CƯỚC VÀ GIÁ CƯỚC</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Loại cước</th>
                        <th>Mã gói</th>
                        <th>Giá cước (VNĐ)</th>
                        <th>Thời hạn sử dụng (ngày)</th>
                        <th>Quyền lợi trên: vlearn.edu.vn</th>
                        <th>Đăng ký</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="font-weight-bold">
                        <td>1</td>
                        <td>Gói cước</td>
                        <td colspan="5"></td>
                    </tr>
                    @foreach($packages as $item)
                        <tr>
                            <td>1.{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->package_code }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->duration }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <form action="{{ route('home.reg') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="package" value="{{ $item->package_code }}">
                                    <button type="submit" class="btn btn-sm btn-primary">Đăng ký ngay</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="font-weight-bold">
                        <td>2</td>
                        <td>Cước mua lẻ</td>
                        <td></td>
                        <td>0-100.000</td>
                        <td>1</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr class="font-weight-bold">
                        <td>3</td>
                        <td>Cước data</td>
                        <td colspan="5">Tính cước theo quy định khi chưa đăng ký gói thành viên trả phí</td>
                    </tr>
                    <tr class="font-weight-bold">
                        <td>4</td>
                        <td>Cước nhắn tới đầu số 9285</td>
                        <td colspan="5">Miễn phí</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section class="ftco-animate">
        <h2 class="text-center">GÓI MUA LẺ</h2>
        <div class="container">
            <nav>
                <div class="nav nav-tabs d-flex" id="nav-tab" role="tablist">
                    @foreach($packages as $item)
                        <a class="nav-item nav-link {{ $loop->first ? 'active' : '' }}" id="nav-{{ $item->package_code }}-tab" data-toggle="tab" href="#nav-{{ $item->package_code }}" role="tab" aria-controls="nav-{{ $item->package_code }}" aria-selected="true">{{ $item->name }}</a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                @foreach($packages as $item)
                    @if(!empty($item->packages))
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="nav-{{ $item->package_code }}" role="tabpanel" aria-labelledby="nav-{{ $item->package_code }}-tab">
                    <section class="testimony-section pt-3">
                        <div class="container">
                            <div class="row ftco-animate">
                                <div class="col-md-12">
                                    <div class="carousel-testimony owl-carousel ftco-owl">
                                        @if(!empty($item->packages))
                                            @foreach($item->packages as $item)
                                                <div class="item text-center">
                                                    <div class="testimony-wrap p-4 pb-5">
                                                        <div class="user-img mb-4" style="background-image: url('{{ $item->picture ? asset($item->picture) : asset('assets/client/img/images/students-in-class-1.png') }}')">
                                                            <span class="quote d-flex align-items-center justify-content-center">
                                                              <i class="icon-quote-left"></i>
                                                            </span>
                                                        </div>
                                                        <div class="text">
                                                            <p class="name">{{ $item->name }}</p>
                                                            <span class="position">{{ $item->price }} VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection

