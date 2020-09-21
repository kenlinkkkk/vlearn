<footer class="ftco-footer ftco-bg-dark" style="border-radius: 30px 30px 0 0">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <img src="{{ asset('assets/client/footer-logo.png') }}" alt="icon" class="img-fluid">
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-5">
                    <h2 class="ftco-heading-2">Trang chủ</h2>
                    <ul class="list-unstyled">
                        <li><a href="" class="py-2 d-block">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Liên hệ</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Tầng 2, tòa nhà VIMECO, Lô E9, Phạm Hùng, Trung Hòa, Cầu Giấy, HN</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <ul class="list-unstyled d-inline-flex">
                    @foreach($pages as $item)
                        @if (in_array('footer', $item->position))
                            <li class="pl-3"><a href="{{ route('home.show-page', [$item->slug]) }}" class="py-2 d-block">{{ $item->title }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 text-center">
                <p>
                    <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        VANO. All Right Reserved</strong>
                </p>
            </div>
        </div>
    </div>
</footer>
