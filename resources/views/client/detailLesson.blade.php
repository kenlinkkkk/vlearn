@extends('layouts.app')

@section('title')
    <title>{{ $lesson->name }}</title>
@endsection

@section('content')
    <div class="container mt-8 mb-8">
        <div class="row mt-4 mb-4">
            <h2>{{ $lesson->name }}</h2>
        </div>
        <div class="row mt-4 mb-4 d-flex justify-content-center">
            <div class="col-sm-12 col-md-8">
                <video width="100%" controls>
                    <source src="{{ asset('media/'. $lesson->video) }}" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <h4>Các video cùng bài học</h4>

            <div class="col-sm-12 col-md-12 mt-4 mb-5">
                <div class="row">
                    @foreach($lessonsSameCourse as $item)
                        <div class="col-sm-6 col-md-3 mt-5">
                            <a href="{{ route('home.course.lessons.detailLesson', ['slug' => $item->slug]) }}" title="{{ $item->name }}">
                                <img src="{{ asset('media/'. $item->image) }}" class="img-fluid" style="border-radius: 0.5rem" alt="{{ $item->name }}">
                            </a>
                            <a href="{{ route('home.course.lessons.detailLesson', ['slug' => $item->slug]) }}" title="{{ $item->name }}" class="text-ellipsis-2">{{ $item->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        setTimeout(function () {

        }, 10000)
    });
</script>
@endsection
