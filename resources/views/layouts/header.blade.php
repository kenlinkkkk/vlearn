<header>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" style="{{ Route::currentRouteName() !== 'home.index' ? 'background: linear-gradient(45deg, #ee76ad 0%, #efac78 100%) !important; top: 0px; border-radius: 0 0 30px 30px;' : '' }}"  id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('assets/client/header-logo.png') }}" alt="header logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ route('home.index') }}" class="nav-link">Trang chủ</a></li>
                    <li class="nav-item"><a href="{{ route('home.intro') }}" class="nav-link">Giới thiệu</a></li>
                    <li class="nav-item"><a href="{{ route('home.cproduct.list_product') }}" class="nav-link">Sản phẩm</a></li>
                    <li class="nav-item"><a href="{{ route('home.cactivity.activity_list') }}" class="nav-link">Hoạt động</a></li>
                    <li class="nav-item"><a href="{{ route('home.crecruitment.recruitment_list') }}" class="nav-link">Tuyển dụng</a></li>
                    <li class="nav-item cta"><a href="{{ route('home.contact') }}" class="nav-link"><span>Liên hệ</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
