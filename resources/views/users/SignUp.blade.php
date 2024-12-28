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

        <!-- Favicons -->
        <link
            rel="icon"
            type="image/png"
            href="{{asset("images/storage/logo.png")}}"
            sizes="32x32"
        />
        <link rel="apple-touch-icon" href="{{asset("images/storage/logo.png")}}" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            Đum Đúm - Đăng Nhập
        </title>
    </head>
    <body>
        <div class="sign section--full-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="sign__content">
                            <!-- registration form -->
                            <form action="{{ route('register') }}" class="sign__form" enctype="multipart/form-data" method="post">
                                <a href="{{ route('index') }}" class="sign__logo">
                                    <img src="{{asset("images/storage/logo.png")}}" alt="" />
                                </a>
                                @csrf
                                <div class="sign__group">
                                    <input
                                        type="text"
                                        name="name"
                                        class="sign__input"
                                        placeholder="Tên" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sign__group">
                                    <input
                                        type="text"
                                        name="email"
                                        class="sign__input"
                                        placeholder="Email" />
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sign__group">
                                    <input
                                        type="password"
                                        name="password"
                                        class="sign__input"
                                        placeholder="Mật khẩu" />
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sign__group">
                                    <input type="password"
                                           name="password_confirmation"
                                           class="sign__input"
                                           placeholder="Xác nhận mật khẩu"
                                        >

                                </div>
                                <div class="sign__group">
                                    <input id="image" type="file" name="image">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="sign__group sign__group--checkbox">
                                    <input
                                        id="remember"
                                        name="remember"
                                        type="checkbox"
                                        checked="checked" />


                                    <label for="remember">Tôi đồng ý với
                                        <a href="{{ route('privacy') }}">Chính sách bảo mật</a></label>
                                </div>

                                <button class="sign__btn" type="submit">
                                    Đăng ký
                                </button>

                                <span class="sign__text">Đã có tài khoản?
                                    <a href="{{ route('login') }}">Đăng nhập!</a></span>

                                <span class="sign__text">Sau khi đăng kí vui lòng vào mail để xác nhận</span>
                            </form>
                            <!-- registration form -->
                            <!-- registration form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.shared.loader')
        @include('layouts.shared.message')
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
