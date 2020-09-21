@extends('layouts.app')

@section('title')
    <title>{{ $page->title }}</title>
@endsection

@section('content')
    <section class="ftco-section ftco-animate">
        <div class="container">
            <div class="d-inline-block">
                <h1><b>{{ $page->title }}</b></h1>
            </div>
        </div>
        <div class="container">
            {!! $page->content !!}
        </div>
    </section>
@endsection
