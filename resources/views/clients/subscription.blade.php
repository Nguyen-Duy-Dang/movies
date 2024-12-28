@extends('layouts.layout')
@section('content')
 <!-- head -->
 <section class="section section--head section--head-fixed">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <h1 class="section__title section__title--head">
                    Đăng ký gói premium
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
                    Mua gói
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
            <form action="{{route('subscription.payment')}}" class=" sign__form--subscription" method="POST">
                @csrf
                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="col-12 col-xl-6 w-100" style="max-width:100%">
                            <h3>Chọn gói</h3>
                            <div class="subscriptions__select">
                                @foreach ($subscriptions as $index => $subscription)
                                    <div class="item subscription__item">
                                        <div class="sign__input--radio">
                                            <input class="sign__input--radio subscription__item--radio" duration="{{$subscription->duration}}" price="{{$subscription->price}}" subscription__name="{{$subscription->name}}" type="radio" name="subscription" value="{{$subscription->id}}" @checked($plan == $index)>
                                        </div>
                                        <div class="information">
                                            <p class="pack">
                                                {{$subscription->name}}
                                                <span>{{$subscription->duration}} Ngày</span>
                                            </p>
                                            <p>{{$subscription->price ? number_format($subscription->price, 0, ',', '.') : '0'}} VND</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                    <div class="col-12 col-xl-6 w-100" style="max-width:100%">
                            <h3>Chọn hình thức thanh toán</h3>
                            <div class="payments__select">
                                <div class="item">
                                    <div class="sign__input--radio">
                                        <input class="sign__input--radio" type="radio" name="payment" id="" value="vnpay" checked>
                                    </div>
                                    <div class="information">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp1v7T287-ikP1m7dEUbs2n1SbbLEqkMd1ZA&s" alt="">
                                        <p>VNPay - QR</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                
                <div class="col-12 col-lg-5 col-xl-4 payment__information">
                    <h2>Thông tin thanh toán</h2>
                    <div class="col-12 item">
                        <p>
                            Tài khoản
                            <span>{{auth()->user()->email}}</span>
                        </p>
                    </div>
                    <div class="col-12 item">
                        <p>
                            Thời hạn gói
                            <span class="subscription__duration">{{$subscriptions[$plan]->duration}} Ngày</span>
                        </p>
                        <p>
                            Giá gói
                            <span class="subscription__price">{{$subscriptions[$plan]->price ? number_format($subscriptions[$plan]->price, 0, ',', '.') : '0'}} VND</span>
                        </p>
                        <p>
                            Dịch vụ
                            <span class="subscription__name">{{$subscriptions[$plan]->name}}</span>
                        </p>
                    </div>
                    <div class="pay__total">
                        <div class="price">
                            <p>Tổng thanh toán:</p>
                            <span class="subscription__total">{{$subscriptions[$plan]->price ? number_format($subscriptions[$plan]->price, 0, ',', '.') : '0'}} VND</span>
                        </div>
                        <button type="submit" name="redirect">Thanh toán</button>
                        <div class="col-12">
                            <p style="margin-bottom: 20px">
                                Quyền lợi:
                            </p>
                            <ul class="plan__list">
                                <li class="green_sub">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#29b474"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    Xem phim với độ phân giải lên đến 1080p!
                                </li>
                                <li class="green_sub">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#dc3545"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                                    Xem phim với giật lag!
                                </li>
                                <li class="green_sub">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#29b474"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    Tải phim với độ phân giải lên đến 1080p!
                                </li>
                                <li class="green_sub">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#29b474"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                                    Những huy hiệu đặc biệt khi bình luận!
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- end contacts -->
@endsection