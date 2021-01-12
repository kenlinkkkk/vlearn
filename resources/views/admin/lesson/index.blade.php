@extends('admin.layout')

@section('title')
    <title>Quản lý bài học</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Quản lý bài học</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Quản lý bài học</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="d-flex justify-content-between">
                        <p>Hoạt động</p>
                        <a class="btn btn-sm btn-success mb-2" href="{{ route('admin.lesson.add') }}">Thêm mới</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên bài học</th>
                            <th>Khóa học</th>
                            <th class="text-right">Trạng thái</th>
                            <th class="text-right">Action</th>
                        </tr>
                        @foreach($lessons as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->withPackage->name }}</td>
                                @if($item->status == 1)
                                    <td><span class="badge badge-pill badge-success float-right">Active</span></td>
                                @else
                                    <td><span class="badge badge-pill badge-danger float-right">Inactive</span></td>
                                @endif
                                <td class="text-right">
                                    <form id="form-{{ $item->id }}" method="post" action="{{ route('admin.lesson.update', [$item->id]) }}">
                                        @csrf
                                        <input type="hidden" name="status" value="{{ $item->status == 1 ? 0 : 1 }}">
                                        <a href="{{ route('admin.lesson.edit', [$item->id]) }}" class="btn btn-success btn-sm">Sửa</a>
                                        @if($item->status == 1)
                                            <button type="submit" itemId="{{ $item->id }}" class="btn btn-danger btn-sm btn-delete">Deactive</button>
                                        @else
                                            <button type="submit" itemId="{{ $item->id }}" class="btn btn-success btn-sm btn-delete">Active</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("body").on("click", ".btn-delete", function(e){
            e.preventDefault();
            let id = $(this).attr('itemId');
            swal.fire({
                title: "Bạn có chắc không?",
                text: "Bạn sẽ không thể khôi phục lại thông tin này khi đã xóa!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Đúng! Tôi chắc chắn!",
                cancelButtonText: "Hủy",
                closeOnConfirm: false
            }).then((result) => {
                if (result.value) {
                    $('#form-' + id).submit();
                }
            });
        });
    </script>
@endsection
