@extends('admin.layout')

@section('title')
    <title>Thêm mới trang</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Thêm mới trang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item">Trang</li>
                        <li class="breadcrumb-item active">Thêm mới</li>
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
                    <form method="post" action="{{ route('admin.page.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label>Short tag</label>
                            <input type="text" class="form-control" name="slug">
                        </div>
                        <div class="form-group">
                            <label>Vị trí hiển thị</label>
                            <div class="custom-control custom-checkbox custom-checkbox-info mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheckcolor1" name="position[]" value="footer">
                                <label class="custom-control-label" for="customCheckcolor1">Navbar</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-checkbox-info mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheckcolor2" name="position[]" value="navbar">
                                <label class="custom-control-label" for="customCheckcolor2">Footer</label>
                            </div>
                        </div>
                        <label>Nội dung <span class="text-danger">(*)</span></label>
                        <textarea id="elm1" name="content" required></textarea>
                        <p class="text-danger">Trường (*) là bắt buộc</p>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" name="submit" class=" m-2 btn btn-sm btn-success">Thêm mới</button>
                            <a href="{{ route('admin.page.index') }}" class="m-2 btn btn-sm btn-warning">Trở về</a>
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
    <script src="{{ asset('assets/admin/js/pages/form-element.init.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/form-editor.init.js') }}"></script>
    <script>
        bsCustomFileInput.init();
    </script>
@endsection
