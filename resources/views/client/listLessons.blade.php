@extends('layouts.app')

@section('title')
    <title>{{ $course->name }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row mt-4">
            <h2>{{ $course->name }}</h2>
        </div>
        <div class="row">
            @foreach($lessons as $item)
                <div class="col-sm-6 col-md-3">
                    <img src="{{ asset('uploads/lessons/thumbnail64_'.$item->picture) }}" class="img-fluid" alt="{{ $item->name }}">
                </div>
            @endforeach
        </div>
        {{ $lessons->links() }}
    </div>
@endsection
