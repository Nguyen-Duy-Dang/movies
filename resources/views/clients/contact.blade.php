@extends('layouts.layout')
@section('content')
 <!-- head -->
 <section class="section section--head section--head-fixed">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <h1 class="section__title section__title--head">
                    Liên hệ
                </h1>
            </div>

            <div class="col-12 col-xl-6">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item">
                        <a href="{{route('index')}}">Trang chủ</a>
                    </li>
                    <li
                    class="breadcrumb__item breadcrumb__item--active"
                >
                    Liên hệ
                </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end head -->

<!-- contacts -->
<section class="section section--pb0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 col-xl-8">
                <form
                    action="{{route('contact')}}"
                    class="sign__form sign__form--contacts"
                    method="POST"
                >
                    @csrf
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="sign__group">
                                <input
                                    type="text"
                                    name="name"
                                    class="sign__input"
                                    placeholder="Tên của bạn"
                                    value="{{(auth()->check()) ? auth()->user()->name : ""}}"
                                    readonly
                                />
                            </div>
                        </div>

                        <div class="col-12 col-xl-6">
                            <div class="sign__group">
                                <input
                                    type="email"
                                    name="email"
                                    class="sign__input"
                                    placeholder="Email của bạn"
                                    value="{{(auth()->check()) ? auth()->user()->email : ""}}"
                                    readonly
                                />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="sign__group">
                                <textarea
                                    name="content"
                                    class="sign__textarea"
                                    placeholder="Tin nhắn của bạn"
                                >{{old('content')}}</textarea>
                                @error('content')
									<span style="color: #df4a32">{{$message}}</span>
								@enderror
                            </div>
                        </div>

                        <div class="col-12 col-xl-3">
                            <button type="submit" class="sign__btn">
                                Gửi
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-lg-5 col-xl-4">
                <h2 class="section__title section__title--sidebar">
                    Thông tin
                </h2>
                <p class="section__text">
                    Mọi thắc mắc xin vui lòng liên hệ với chúng tôi:
                </p>
                <ul class="contacts__list">
                    <li>
                        <a href="tel:+84346074020"
                            >Số điện thoại: +84 346 074 020</a
                        >
                    </li>
                    <li>
                        <a href="mailto:dumdumteam.dev@gmail.com"
                            >Email: dumdumteam.dev@gmail.com</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end contacts -->
@endsection