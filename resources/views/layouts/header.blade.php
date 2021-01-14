<header>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('assets/client/header-logo.png') }}" width="150" alt="header logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    @if(session()->exists('_user.msisdn') && session()->get('_user')['msisdn'] != 'empty')
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Xin chào: {{ '*****'. substr(session()->get('_user')['msisdn'], -3) }}
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                <a href="{{ route('home.showProfile') }}" class="dropdown-item m-2 text-white">Thông tin cá nhân</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('home.postLogout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item m-2 text-danger" type="submit"> Đăng xuất</button>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item"><a href="{{ route('home.course.listCourse') }}" class="nav-link">Khóa học của bạn</a></li>
                    @endif
                    <li class="nav-item"><a href="{{ route('home.index') }}" class="nav-link">Trang chủ</a></li>
                    <li class="nav-item"><a href="#intro" class="nav-link">Giới thiệu</a></li>
                    <li class="nav-item"><a href="#package" class="nav-link">Gói</a></li>
                        @if (!empty($pages))
                            @foreach($pages as $item)
                                @if (in_array('navbar', json_decode($item->position)))
                                    <li class="nav-item"><a href="{{ route('home.show-page', [$item->slug]) }}" class="nav-link">{{ $item->title }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @if(session()->get('_user')['msisdn'] == 'empty' || empty(session()->get('_user')['msisdn']))
                            <li class="nav-item"><a href="{{ route('home.showLogin') }}" class="nav-link"><span>Đăng nhập</span></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
