@extends('layouts.app')

@section('title')
    <title>{{ $course->name }}</title>
@endsection

@section('content')
    <div class="container mt-8 mb-8">
        <div class="row mt-4 mb-4">
            <h2>{{ $course->name }}</h2>
        </div>
        <div class="row mt-4 mb-4">
            @foreach($lessons as $item)
                <div class="col-sm-6 col-md-3">
                    <img src="{{ asset('uploads/lessons/thumbnail64_'.$item->image) }}" style="border-radius: 0.5rem" class="img-fluid" alt="{{ $item->name }}">
                    <a href="{{ route('home.course.lessons.detailLesson', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                </div>
            @endforeach
        </div>
        {{ $lessons->links() }}
    </div>
@endsection
