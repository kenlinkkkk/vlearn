@extends('layouts.app')

@section('title')
<title>Sản phẩm</title>
@endsection

@section('content')
<section class="ftco-section">
    <div class="container">
        <img src="{{ asset('assets/client/img/icon/icon-1.png') }}" alt="icon" class="img-fluid">
        <hr style="width: 30%;">
        <div class="row">
            <h3>{{ $product->title }}</h3>
        </div>
    </div>
</section>
@endsection
