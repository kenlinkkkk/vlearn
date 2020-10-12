<header>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('assets/client/img/images/logo.png') }}" width="45" alt="header logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    @if(session()->get('_user')['msisdn'] != 'empty' && !empty(session()->get('_user')['msisdn']))
                        <li class="nav-item"><a href="#" class="nav-link">Xin chào: {{ '*****'. substr(session()->get('_user')['msisdn'], -3) }}</a></li>
                    @endif
                    <li class="nav-item"><a href="{{ route('home.index') }}" class="nav-link">Trang chủ</a></li>
                    <li class="nav-item"><a href="#intro" class="nav-link">Giới thiệu</a></li>
                    <li class="nav-item"><a href="#package" class="nav-link">Gói</a></li>
                    @foreach($pages as $item)
                        @if (in_array('navbar', $item->position))
                            <li class="nav-item"><a href="{{ route('home.show-page', [$item->slug]) }}" class="nav-link">{{ $item->title }}</a></li>
                        @endif
                    @endforeach
                    <li class="nav-item"><a href="https://vlearn.edu.vn/auth/login?returnUrl=%2F" class="nav-link"><span>Đăng nhập</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
