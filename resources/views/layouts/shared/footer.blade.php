<footer class="footer">
    <div class="container">
        <div class="row">
            <div
                class="col-12 col-sm-8 col-md-6 col-lg-4 col-xl-3 order-4 order-md-1 order-lg-4 order-xl-1"
            >
                <div class="footer__flixtv">
                    <img width="100px" src="{{asset('images/storage/logo.png')}}" alt="" />
                </div>
                <p class="footer__tagline">
                    Phim & Chương trình truyền hình, Rạp chiếu phim trực
                    tuyến<br />
                </p>
            </div>

            <div
                class="col-6 col-md-4 col-lg-3 col-xl-2 order-1 order-md-2 order-lg-1 order-xl-2 offset-md-2 offset-lg-0 offset-xl-1"
            >
                <h6 class="footer__title">Đum Đúm</h6>
                <div class="footer__nav">
                    <a href="{{route('about')}}">Về chúng tôi</a>
                    <a href="{{route('privacy')}}">Chính sách bảo mật</a>
                    <a href="{{route('contact')}}">Liên hệ</a>
                </div>
            </div>

            <div
                class="col-12 col-md-8 col-lg-6 col-xl-4 order-3 order-lg-2 order-md-3 order-xl-3"
            >
                <div class="row">
                    <div class="col-12">
                        <h6 class="footer__title">Duyệt qua</h6>
                    </div>

                    <div class="col-6">
                        <div class="footer__nav">
                            <a href="{{route('about')}}"
                                >Thông tin website</a
                            >
                            <a href="{{route('about')}}">Đum Đúm Web</a>
                            <a href="{{route('about')}}">Câu chuyện</a>
                            <a href="{{route('about')}}"
                                >Trải nghiệm</a
                            >
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="footer__nav">
                            <p>Phim hay</p>
                            <p>Chất lượng</p>
                            <p>Sắc nét</p>
                            <p>Nhiều ưu đãi</p>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="col-6 col-md-4 col-lg-3 col-xl-2 order-2 order-lg-3 order-md-4 order-xl-4"
            >
                <h6 class="footer__title">Trợ giúp</h6>
                <div class="footer__nav">
                    <a href="{{route('privacy')}}">Tài khoản & Thanh toán</a>
                    <a href="{{route('privacy')}}">Gói & Giá cả</a>
                    <a href="{{route('privacy')}}">Thiết bị được hỗ trợ</a>
                    <a href="{{route('privacy')}}"> Khả năng tiếp cận</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="footer__content">
                    <div class="footer__links">
                        <a href="{{route('privacy')}}">Chính sách bảo mật</a>
                    </div>
                    <small class="footer__copyright"
                        >© Đum Đúm. Created by
                        <a>DumDumTeam</a>.
                    </small>
                </div>
            </div>
        </div>
    </div>
</footer>