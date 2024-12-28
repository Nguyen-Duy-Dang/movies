@extends('layouts.layout')
@section('content')
<!-- head -->
<section class="section section--head section--head-fixed">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <h1 class="section__title section__title--head">
                    Đum Đúm – Nơi tốt nhất để xem phim
                </h1>
            </div>

            <div class="col-12 col-xl-6">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item">
                        <a href="{{route("index")}}">Trang chủ</a>
                    </li>
                
                    <li
                    class="breadcrumb__item breadcrumb__item--active"
                >
                    Về chúng tôi
                </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end head -->

<!-- about -->
<section class="section section--pb0">
    <div class="container">
        <div class="row">
            <!-- section text -->
            <div class="col-12">
                <p class="section__text section__text--small">
                    <a href="#">Đum Đúm</a> là nền tảng xem phim trực
                    tuyến hàng đầu, cung cấp cho bạn một kho tàng phim
                    ảnh phong phú và đa dạng. Chúng tôi cam kết mang đến
                    cho bạn trải nghiệm xem phim tốt nhất với chất lượng
                    hình ảnh và âm thanh tuyệt vời.
                </p>

                <p class="section__text section__text--small">
                    Sứ mệnh của chúng tôi là kết nối mọi người với những
                    câu chuyện tuyệt vời thông qua phim ảnh. Chúng tôi
                    tin rằng mỗi bộ phim đều có sức mạnh để truyền cảm
                    hứng, giáo dục và giải trí.
                </p>
            </div>
            <!-- end section text -->
        </div>

        <div class="row row--grid">
            <div class="col-12 col-lg-4">
                <div class="step">
                    <span class="step__number">01</span>
                    <h3 class="step__title">Chọn gói của bạn</h3>
                    <p class="step__text">
                        Chúng tôi cung cấp nhiều gói dịch vụ linh hoạt
                        để đáp ứng nhu cầu của bạn. Bạn có thể chọn gói
                        cơ bản với các bộ phim và chương trình truyền
                        hình phổ biến, hoặc nâng cấp lên gói cao cấp để
                        trải nghiệm chất lượng hình ảnh 4K và truy cập
                        vào các nội dung độc quyền. Hãy lựa chọn gói
                        dịch vụ phù hợp nhất với nhu cầu giải trí của
                        bạn và gia đình!
                    </p>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="step">
                    <span class="step__number">02</span>
                    <h3 class="step__title">Tạo tài khoản</h3>
                    <p class="step__text">
                        Để bắt đầu trải nghiệm Đum Đúm, bạn cần tạo một
                        tài khoản miễn phí. Chỉ mất vài phút để điền
                        thông tin cá nhân và xác nhận địa chỉ email của
                        bạn. Sau khi hoàn tất, bạn sẽ có quyền truy cập
                        vào tất cả các bộ phim và chương trình truyền
                        hình mà chúng tôi cung cấp. Hãy tham gia cùng
                        chúng tôi ngay hôm nay!
                    </p>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="step">
                    <span class="step__number">03</span>
                    <h3 class="step__title">Thưởng thức Đum Đúm</h3>
                    <p class="step__text">
                        Bây giờ bạn đã có tài khoản, hãy bắt đầu thưởng
                        thức Đum Đúm! Khám phá kho tàng phim ảnh phong
                        phú và đa dạng, từ các bộ phim mới nhất cho đến
                        những tác phẩm kinh điển. Với chất lượng hình
                        ảnh và âm thanh tuyệt vời, bạn sẽ có những trải
                        nghiệm giải trí tuyệt vời ngay tại nhà. Hãy ngồi
                        lại, thư giãn và tận hưởng những giây phút giải
                        trí tuyệt vời cùng Đum Đúm!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end about -->

<!-- steps -->
<section class="section section--pb0 section--gradient">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section__title">Đăng ký tính năng</h2>
            </div>
        </div>

        <div class="row row--grid">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="feature">
                    <span class="feature__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M19,7H18V6a3,3,0,0,0-3-3H5A3,3,0,0,0,2,6H2V18a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V10A3,3,0,0,0,19,7ZM5,5H15a1,1,0,0,1,1,1V7H5A1,1,0,0,1,5,5ZM20,15H19a1,1,0,0,1,0-2h1Zm0-4H19a3,3,0,0,0,0,6h1v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V8.83A3,3,0,0,0,5,9H19a1,1,0,0,1,1,1Z"
                            />
                        </svg>
                    </span>
                    <h3 class="feature__title">
                        Chọn gói dịch vụ phù hợp
                    </h3>
                    <p class="feature__text">
                        Lựa chọn giữa các gói dịch vụ đa dạng, từ cơ bản
                        đến cao cấp, để tận hưởng trải nghiệm phim ảnh
                        tốt nhất.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="feature">
                    <span class="feature__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M9,10a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V11A1,1,0,0,0,9,10Zm12,1a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H3A1,1,0,0,0,2,6v4a1,1,0,0,0,1,1,1,1,0,0,1,0,2,1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1,1,1,0,0,1,0-2ZM20,9.18a3,3,0,0,0,0,5.64V17H10a1,1,0,0,0-2,0H4V14.82A3,3,0,0,0,4,9.18V7H8a1,1,0,0,0,2,0H20Z"
                            />
                        </svg>
                    </span>
                    <h3 class="feature__title">
                        Đăng ký tài khoản nhanh
                    </h3>
                    <p class="feature__text">
                        Tạo tài khoản miễn phí chỉ trong vài phút và bắt
                        đầu khám phá kho phim phong phú mà Đum Đúm cung
                        cấp.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="feature">
                    <span class="feature__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M20,2H10A3,3,0,0,0,7,5v7a3,3,0,0,0,3,3H20a3,3,0,0,0,3-3V5A3,3,0,0,0,20,2Zm1,10a1,1,0,0,1-1,1H10a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1ZM17.5,8a1.49,1.49,0,0,0-1,.39,1.5,1.5,0,1,0,0,2.22A1.5,1.5,0,1,0,17.5,8ZM16,17a1,1,0,0,0-1,1v1a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V15H4a1,1,0,0,0,0-2H3V12a1,1,0,0,1,1-1A1,1,0,0,0,4,9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H14a3,3,0,0,0,3-3V18A1,1,0,0,0,16,17ZM6,18H7a1,1,0,0,0,0-2H6a1,1,0,0,0,0,2Z"
                            />
                        </svg>
                    </span>
                    <h3 class="feature__title">
                        Khám phá bộ sưu tập phim
                    </h3>
                    <p class="feature__text">
                        Khám phá hàng ngàn bộ phim và chương trình
                        truyền hình thuộc nhiều thể loại khác nhau, phục
                        vụ mọi sở thích.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="feature">
                    <span class="feature__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M21.53,7.15a1,1,0,0,0-1,0L17,8.89A3,3,0,0,0,14,6H5A3,3,0,0,0,2,9v6a3,3,0,0,0,3,3h9a3,3,0,0,0,3-2.89l3.56,1.78A1,1,0,0,0,21,17a1,1,0,0,0,.53-.15A1,1,0,0,0,22,16V8A1,1,0,0,0,21.53,7.15ZM15,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V9A1,1,0,0,1,5,8h9a1,1,0,0,1,1,1Zm5-.62-3-1.5V11.12l3-1.5Z"
                            />
                        </svg>
                    </span>
                    <h3 class="feature__title">
                        Tùy chỉnh trải nghiệm xem
                    </h3>
                    <p class="feature__text">
                        Tùy chỉnh trải nghiệm xem phim của bạn bằng cách
                        tạo danh sách yêu thích và nhận gợi ý cá nhân
                        hóa từ Đum Đúm.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="feature">
                    <span class="feature__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M21,2a1,1,0,0,0-1,1V5H18V3a1,1,0,0,0-2,0V4H8V3A1,1,0,0,0,6,3V5H4V3A1,1,0,0,0,2,3V21a1,1,0,0,0,2,0V19H6v2a1,1,0,0,0,2,0V20h8v1a1,1,0,0,0,2,0V19h2v2a1,1,0,0,0,2,0V3A1,1,0,0,0,21,2ZM6,17H4V15H6Zm0-4H4V11H6ZM6,9H4V7H6Zm10,9H8V13h8Zm0-7H8V6h8Zm4,6H18V15h2Zm0-4H18V11h2Zm0-4H18V7h2Z"
                            />
                        </svg>
                    </span>
                    <h3 class="feature__title">
                        Xem phim mọi lúc, mọi nơi
                    </h3>
                    <p class="feature__text">
                        Thưởng thức các bộ phim yêu thích trên mọi thiết
                        bị, từ điện thoại đến TV thông minh, bất cứ lúc
                        nào bạn muốn.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="feature">
                    <span class="feature__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M19.63,3.65a1,1,0,0,0-.84-.2,8,8,0,0,1-6.22-1.27,1,1,0,0,0-1.14,0A8,8,0,0,1,5.21,3.45a1,1,0,0,0-.84.2A1,1,0,0,0,4,4.43v7.45a9,9,0,0,0,3.77,7.33l3.65,2.6a1,1,0,0,0,1.16,0l3.65-2.6A9,9,0,0,0,20,11.88V4.43A1,1,0,0,0,19.63,3.65ZM18,11.88a7,7,0,0,1-2.93,5.7L12,19.77,8.93,17.58A7,7,0,0,1,6,11.88V5.58a10,10,0,0,0,6-1.39,10,10,0,0,0,6,1.39ZM13.54,9.59l-2.69,2.7-.89-.9a1,1,0,0,0-1.42,1.42l1.6,1.6a1,1,0,0,0,1.42,0L15,11a1,1,0,0,0-1.42-1.42Z"
                            />
                        </svg>
                    </span>
                    <h3 class="feature__title">
                        Chia sẻ niềm vui với bạn bè
                    </h3>
                    <p class="feature__text">
                        Chia sẻ những bộ phim yêu thích với bạn bè và
                        gia đình, cùng nhau tận hưởng những khoảnh khắc
                        giải trí tuyệt vời.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="feature feature--prelast">
                    <span class="feature__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M3,14a1,1,0,0,0,0,2,3,3,0,0,1,3,3,1,1,0,0,0,2,0A5,5,0,0,0,3,14Zm-.71,4.29a1,1,0,1,0,1.42,0A1,1,0,0,0,2.29,18.29ZM19,4H5A3,3,0,0,0,2,7,1,1,0,0,0,4,7,1,1,0,0,1,5,6H19a1,1,0,0,1,1,1V17a1,1,0,0,1-1,1H15a1,1,0,0,0,0,2h4a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4ZM3,10a1,1,0,0,0,0,2,7,7,0,0,1,7,7,1,1,0,0,0,2,0A9,9,0,0,0,3,10Z"
                            />
                        </svg>
                    </span>
                    <h3 class="feature__title">
                        Cập nhật nội dung mới nhất
                    </h3>
                    <p class="feature__text">
                        Đăng ký nhận thông báo để không bỏ lỡ bất kỳ bộ
                        phim hay chương trình nào mới được thêm vào
                        Đum Đúm.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="feature feature--last">
                    <span class="feature__icon">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68a1,1,0,0,0,.4,1,1,1,0,0,0,1.05.07L12,18.76l5.1,2.68a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.89l.72,4.19-3.76-2a1,1,0,0,0-.94,0l-3.76,2,.72-4.19a1,1,0,0,0-.29-.89l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"
                            />
                        </svg>
                    </span>
                    <h3 class="feature__title">Tham gia điện ảnh</h3>
                    <p class="feature__text">
                        Kết nối với những người đam mê điện ảnh khác
                        trong cộng đồng Đum Đúm, chia sẻ ý kiến và tham
                        gia thảo luận thú vị.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end steps -->
@endsection
