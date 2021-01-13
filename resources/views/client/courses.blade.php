@extends('layouts.app')

@section('title')
    <title>Danh sách khóa học</title>
@endsection

@section('content')
    <div class="container table-responsive">
        <table class="table table-bordered mt-4">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên bài học</th>
                <th>Số bài học hiện tại</th>
                <th></th>
            </tr>
            @foreach($subPackages  as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->withLessons->count() }} bài mới</td>
                    <td class="text-center"><a href="{{ route('home.course.listLessons', ['slug' => $item->slug, 'p' => strtolower($item->package->package_code)]) }}" class="btn btn-sm btn-outline-success">Vào học</a></td>
                </tr>
            @endforeach
            </thead>
        </table>
        {{ $subPackages->links() }}
    </div>
@endsection
