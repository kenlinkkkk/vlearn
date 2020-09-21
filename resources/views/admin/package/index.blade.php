@extends('admin.layout')

@section('title')
    <title>Quản lý gói</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Quản lý gói</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Quản lý gói</li>
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
                        <a class="btn btn-sm btn-success mb-2" href="{{ route('admin.package.add') }}">Thêm mới</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên gói</th>
                            <th class="text-justify">Mã gói</th>
                            <th>Giá</th>
                            <th class="text-right">Gói lẻ</th>
                            <th class="text-right">Trạng thái</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($packages as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-justify">{{ $item->package_code }}</td>
                                <td>{{ $item->price }}</td>
                                <td class="text-right">{{ !empty($item->package->name) ? $item->package->name : 'null' }}</td>
                                @if($item->status == 1)
                                    <td><span class="badge badge-pill badge-success float-right">Active</span></td>
                                @else
                                    <td><span class="badge badge-pill badge-danger float-right">Inactive</span></td>
                                @endif
                                <td class="text-right">
                                    <form id="form-{{ $item->id }}" method="post" action="{{ route('admin.package.update', [$item->id]) }}">
                                        @csrf
                                        <input type="hidden" name="status" value="{{ $item->status == 1 ? 0 : 1 }}">
                                        <a href="{{ route('admin.package.edit', [$item->id]) }}" class="btn btn-success btn-sm">Sửa</a>
                                        @if($item->status == 1)
                                            <button type="submit" itemId="{{ $item->id }}" class="btn btn-danger btn-sm btn-delete">Deactive</button>
                                        @else
                                            <button type="submit" itemId="{{ $item->id }}" class="btn btn-success btn-sm btn-delete">Active</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
