@extends('admin.layout')

@section('title')
    <title>Thông tin cá nhân</title>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Thông tin cá nhân</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('assets/admin/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                @if ($user->avatar == null)
                                    <img src="{{ asset('assets/admin/images/companies/img-6.png') }}" alt="" class="img-thumbnail rounded-circle">
                                @else
                                    <img src="{{ asset($user->avatar) }}" alt="" class="img-thumbnail rounded-circle">
                                @endif
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ $user->name }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Thông tin cá nhân</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                            <tr>
                                <th scope="row">Full Name :</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail :</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thay đổi mật khẩu</h4>
                    <form method="post" action="{{ route('admin.change.password') }}">
                        @csrf
                        <div class="form-group">
                            <label>Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" name="password_old">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password_new">
                        </div>
                        <div class="form-group">
                            <label>Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" name="password_confirm">
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" name="submit" class=" m-2 btn btn-sm btn-success">Xác nhận</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')
{{--    <script src="{{ asset('assets/admin/js/pages/profile.init.js') }}"></script>--}}
@endsection
