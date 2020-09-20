<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if (\Illuminate\Support\Facades\Auth::user()->avatar == null)
            <img src="{{ asset('assets/admin/images/companies/img-6.png') }}" alt="" class="rounded-circle header-profile-user">
        @else
            <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()) }}" alt="" class="rounded-circle header-profile-user">
        @endif
        <span class="d-none d-xl-inline-block ml-1">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
        <!-- item-->
        <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="dropdown-item text-danger" type="submit"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</button>
        </form>
    </div>
</div>