@extends('layouts.app')

@section('title')
    <title>Hoạt động</title>
@endsection

@section('content')
    <section class="ftco-section" style="background-image:url('{{ asset('assets/client/img/images/bg-logo.png') }}'); background-repeat: no-repeat; background-position: center right;">
        <div class="container">
            <img src="{{ asset('assets/client/img/icon/icon-1.png') }}" alt="icon" class="img-fluid">
            <h1><b>HOẠT ĐỘNG</b></h1>
            <hr style="width: 30%;">
            <div class="row">
                @foreach($activities as $item)
                    <div class="col-sm-12 col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <img src="{{ asset($item->picture) }}" class="img-fluid">
                                    </div>
                                    <div class="col-sm-6 col-md-9">
                                        <a href="#"><h3>{{ $item->title }}</h3></a>
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
