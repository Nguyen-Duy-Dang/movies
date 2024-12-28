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
        <!-- sign in -->
        <div class="sign section--full-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="sign__content">
                            <!-- authorization form -->
                            <form action="{{route('login')}}" method="POST" class="sign__form">
                                @csrf
                                <a href="{{route("index")}}" class="sign__logo">
                                    <img src="{{asset("images/storage/logo.png")}}" alt="" />
                                </a>

                                <div class="sign__group">
                                    <input
                                        type="text"
                                        class="sign__input"
                                        placeholder="Email"
                                        name="email"
                                        value="{{old('email')}}"
                                    />
                                    @error('email')
                                        <span class="input__error" style="color: #df4a32">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="sign__group">
                                    <input
                                        type="password"
                                        class="sign__input"
                                        placeholder="Mật khẩu"
                                        name="password"
                                        value="{{old('password')}}"
                                    />
                                    @error('password')
                                        <span class="input__error" style="color: #df4a32">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="sign__group sign__group--checkbox">
                                    <input
                                        id="remember"
                                        name="remember"
                                        type="checkbox"
                                        checked="checked"
                                    />
                                    <label for="remember">Nhớ tôi cho lần đăng nhập sau?</label>
                                </div>

                                <button class="sign__btn">
                                    Đăng nhập
                                </button>

                                <span class="sign__text"
                                    >Bạn chưa có tài khoản?
                                    <a href="{{route("signup")}}">Đăng ký!</a></span
                                >

                                <span class="sign__text"
                                    ><a href="{{route("forgot")}}"
                                        >Quên mật khẩu?</a
                                    ></span
                                >
                            </form>
                            <!-- end authorization form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end sign in -->
        @include('layouts.shared.loader')
        <div class="message__container">
            @include('layouts.shared.message')
        </div>
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
