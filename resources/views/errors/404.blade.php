<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset("css/bootstrap-reboot.min.css")}}" />
        <link rel="stylesheet" href="{{asset("css/bootstrap-grid.min.css")}}" />
        <link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}" />
        <link rel="stylesheet" href="{{asset("css/slider-radio.css")}}" />
        <link rel="stylesheet" href="{{asset("css/select2.min.css")}}" />
        <link rel="stylesheet" href="{{asset("css/magnific-popup.css")}}" />
        <link rel="stylesheet" href="{{asset("css/plyr.css")}}" />
        <link rel="stylesheet" href="{{asset("css/main.css")}}" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Itim&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicons -->
        <link
            rel="icon"
            type="image/png"
            href="{{asset("images/storage/logo.png")}}"
            sizes="32x32"
        />
        <link rel="apple-touch-icon" href="{{asset("images/storage/logo.png")}}" />

        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Dmitry Volkov" />
        <title>
            Đum Đúm – Phim & Chương trình truyền hình, Rạp chiếu phim trực tuyến
        </title>
    </head>
    <body>
        <!-- page 404 -->
        <div class="page-404 section--full-bg" data-bg="img/bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-404__wrap">
                            <div class="page-404__content">
                                <h1 class="page-404__title">404</h1>
                                <p class="page-404__text">
                                    Trang của bạn đang tìm không có sẵn!
                                </p>
                                <button class="page-404__btn"
                                    >Quay trở lại</
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page 404 -->

        @include('layouts.shared.loader')
        <!-- JS -->
        <script src="{{asset("js/jquery-3.5.1.min.js")}}"></script>
        <script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>
        <script src="{{asset("js/owl.carousel.min.js")}}"></script>
        <script src="{{asset("js/slider-radio.js")}}"></script>
        <script src="{{asset("js/select2.min.js")}}"></script>
        <script src="{{asset("js/smooth-scrollbar.js")}}"></script>
        <script src="{{asset("js/jquery.magnific-popup.min.js")}}"></script>
        <script src="{{asset("js/plyr.min.js")}}"></script>
        <script src="{{asset("js/main.js")}}"></script>
    </body>
</html>
