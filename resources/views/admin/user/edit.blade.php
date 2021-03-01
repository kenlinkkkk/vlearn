@extends('admin.layout')

@section('title')
    <title>Cập nhật tài khoản</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Cập nhật thông tin tài khoản</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Quản lý tài khoản</a></li>
                        <li class="breadcrumb-item active">Cập nhật thông tin tài khoản</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Thông tin tài khoản</h4>

                    <form method="post" action="{{ route('admin.user.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name" required="required" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>Tài khoản</label>
                            <input type="text" class="form-control" name="user_name" required="required" disabled value="{{ $user->user_name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" required="required" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            @foreach($roles as $item)
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="role" value="{{ $item->id }}" {{ $user->hasRole($item->name) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" name="submit" class=" m-2 btn btn-sm btn-success">Thêm mới</button>
                            <a href="{{ route('admin.user.index') }}" class="m-2 btn btn-sm btn-warning">Trở về</a>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <!--tinymce js-->
    <script src="{{ asset('assets/admin/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/admin/js/pages/form-editor.init.js') }}"></script>
    <script>
        bsCustomFileInput.init();
    </script>
@endsection
