 @extends('layouts.layout')
 @section('content')
 <!-- profile -->
 <div class="catalog catalog--page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profile">
                    <div class="profile__user">
                        <div class="profile__avatar">
                            <img src="{{auth()->user()->image}}" alt="" />
                        </div>
                        <div class="profile__meta">
                            <h3>{{auth()->user()->name}}</h3>
                            <span>
                                Gói: 
                                @if (auth()->user()->premium)
                                    <span style="color: #ffc312">Premium</span>
                                @else
                                    <span style="color: #2f80ed">Thường</span>
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- tabs nav -->
                    <ul
                        class="nav nav-tabs profile__tabs"
                        id="profile__tabs"
                        role="tablist"
                    >
                        <li class="nav-item">
                            <a
                                class="nav-link nav__direction active"
                                data-toggle="tab"
                                href="#tab-1"
                                role="tab"
                                aria-controls="tab-1"
                                aria-selected="true"
                                >Hồ sơ</a
                            >
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link nav__direction"
                                data-toggle="tab"
                                href="#tab-2"
                                role="tab"
                                aria-controls="tab-2"
                                aria-selected="false"
                                >Xem sau</a
                            >
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link nav__direction"
                                data-toggle="tab"
                                href="#tab-3"
                                role="tab"
                                aria-controls="tab-3"
                                aria-selected="false"
                                >Cài đặt</a
                            >
                        </li>
                    </ul>
                    <!-- end tabs nav -->
                    @if (auth()->user()->role == "admin" || auth()->user()->role == "staff")
                        <a href="{{route("admin.category.list")}}" class="manage__website">Quản lí website</a>
                    @endif
                    <a href="#modal-logout" class="profile__logout open-modal">
                        <span>Đăng xuất</span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"
                            ></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- content tabs -->
        <div class="tab-content">
            <div
                class="tab-pane fade show active"
                id="tab-1"
                role="tabpanel"
                >
                <div class="row row--grid">


                    <!-- dashbox -->
                    <div class="col-12 col-xl-12">
                        <div class="dashbox">
                            <div class="dashbox__title">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m387-412 35-114-92-74h114l36-112 36 112h114l-93 74 35 114-92-71-93 71ZM240-40v-309q-38-42-59-96t-21-115q0-134 93-227t227-93q134 0 227 93t93 227q0 61-21 115t-59 96v309l-240-80-240 80Zm240-280q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70ZM320-159l160-41 160 41v-124q-35 20-75.5 31.5T480-240q-44 0-84.5-11.5T320-283v124Zm160-62Z"/></svg>
                                    Dịch vụ
                                </h3>
                            </div>

                            <div
                                class="dashbox__table-wrap dashbox__table-wrap--1"
                            >
                                <table
                                    class="main__table main__table--dash"
                                >
                                    <thead>
                                        <tr>
                                            <th>TÊN GÓI</th>
                                            <th>NGÀY MUA</th>
                                            <th>NGÀY HẾT HẠN</th>
                                            <th>GIÁ GÓI</th>
                                            <th>TÌNH TRẠNG</th>
                                            <th>LỊCH SỬ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($subscriptions->count() > 0)
                                            @foreach ($subscriptions as $subscription)
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="main__table-text"
                                                        >
                                                            {{$subscription->subscription_plan->name}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="main__table-text"
                                                        >
                                                            {{$subscription->start_date}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="main__table-text main__table-text--rate"
                                                        >
                                                            {{$subscription->end_date}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="main__table-text"
                                                        >
                                                            {{$subscription->subscription_plan->price ? number_format($subscription->subscription_plan->price, 0, ',', '.') : '0'}} VND
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if (!$subscription->payment_status)
                                                            <div
                                                                class="main__table-text main__table-text--red"
                                                            >
                                                                Hết hạn
                                                            </div>
                                                        @else
                                                            <div
                                                                class="main__table-text main__table-text--green"
                                                            >
                                                                Đang sử dụng
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="main__table-text main__table-btns">
                                                            <button class="main__table-btn main__table-btn--view show__pay__history" id__subscription="{{$subscription->id}}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-200h80v-40h40q17 0 28.5-11.5T600-280v-120q0-17-11.5-28.5T560-440H440v-40h160v-80h-80v-40h-80v40h-40q-17 0-28.5 11.5T360-520v120q0 17 11.5 28.5T400-360h120v40H360v80h80v40ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-560v-160H240v640h480v-480H520ZM240-800v160-160 640-640Z"/></svg>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="main__table-text">Không có dữ liệu</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end dashbox -->
                    <div class="col-12 col-xl-6">
                        <div class="dashbox">
                            <div class="dashbox__title">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M720-120H280v-520l280-280 50 50q7 7 11.5 19t4.5 23v14l-44 174h258q32 0 56 24t24 56v80q0 7-2 15t-4 15L794-168q-9 20-30 34t-44 14Zm-360-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406Zm-80-34v80H160v360h120v80H80v-520h200Z"/></svg>
                                    Phim đã thích
                                </h3>
                            </div>

                            <div
                                class="dashbox__table-wrap dashbox__table-wrap--1"
                            >
                                <table
                                    class="main__table main__table--dash"
                                >
                                    <thead>
                                        <tr>
                                            <th>PHIM</th>
                                            <th>LƯỢT XEM</th>
                                            <th>HÀNH ĐỘNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($likes->count() > 0)
                                            @foreach ($likes as $like)
                                                <tr class="item__remove" id_remove="{{$like->id}}" type_remove="like">
                                                    <td>
                                                        <div
                                                            class="main__table-text"
                                                        >
                                                            <a href="{{route("movie", $like->id_movie)}}"
                                                                >{{$like->movie->title}}</a
                                                            >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="main__table-text"
                                                        >
                                                            {{$like->movie->views}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="main__table-text main__table-btns"
                                                        >
                                                            <a href="{{route("movie",$like->id_movie)}}" class="main__table-btn main__table-btn--view">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M838-65 720-183v89h-80v-226h226v80h-90l118 118-56 57ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 20-2 40t-6 40h-82q5-20 7.5-40t2.5-40q0-20-2.5-40t-7.5-40H654q3 20 4.5 40t1.5 40q0 20-1.5 40t-4.5 40h-80q3-20 4.5-40t1.5-40q0-20-1.5-40t-4.5-40H386q-3 20-4.5 40t-1.5 40q0 20 1.5 40t4.5 40h134v80H404q12 43 31 82.5t45 75.5q20 0 40-2.5t40-4.5v82q-20 2-40 4.5T480-80ZM170-400h136q-3-20-4.5-40t-1.5-40q0-20 1.5-40t4.5-40H170q-5 20-7.5 40t-2.5 40q0 20 2.5 40t7.5 40Zm34-240h118q9-37 22.5-72.5T376-782q-55 18-99 54.5T204-640Zm172 462q-18-34-31.5-69.5T322-320H204q29 51 73 87.5t99 54.5Zm28-462h152q-12-43-31-82.5T480-798q-26 36-45 75.5T404-640Zm234 0h118q-29-51-73-87.5T584-782q18 34 31.5 69.5T638-640Z"/></svg>
                                                            </a>
                                                            <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn" id_remove="{{$like->id}}" type_remove="like">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m376-300 104-104 104 104 56-56-104-104 104-104-56-56-104 104-104-104-56 56 104 104-104 104 56 56Zm-96 180q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520Zm-400 0v520-520Z"/></svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td></td>
                                                <td class="main__table-text">Không có dữ liệu</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="dashbox">
                            <div class="dashbox__title">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-120q-138 0-240.5-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z"/></svg>
                                    Lịch sử
                                </h3>
                            </div>

                            <div
                                class="dashbox__table-wrap dashbox__table-wrap--1"
                            >
                                <table
                                    class="main__table main__table--dash"
                                >
                                    <thead>
                                        <tr>
                                            <th>TIÊU ĐỀ PHIM</th>
                                            <th>NGÀY XEM</th>
                                            <th>HÀNH ĐỘNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($histories->count() > 0)
                                            @foreach ($histories as $history)
                                                <tr class="item__remove" id_remove="{{$history->id}}" type_remove="history">
                                                    <td>
                                                        <div
                                                            class="main__table-text"
                                                        >
                                                            <a href="{{route("movie", $history->id_movie)}}"
                                                                >{{$history->movie->title}}</a
                                                            >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="main__table-text"
                                                        >
                                                            {{$history->created_at}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="main__table-text main__table-btns"
                                                        >
                                                            <a href="{{route("movie",$history->id_movie)}}" class="main__table-btn main__table-btn--view">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M838-65 720-183v89h-80v-226h226v80h-90l118 118-56 57ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 20-2 40t-6 40h-82q5-20 7.5-40t2.5-40q0-20-2.5-40t-7.5-40H654q3 20 4.5 40t1.5 40q0 20-1.5 40t-4.5 40h-80q3-20 4.5-40t1.5-40q0-20-1.5-40t-4.5-40H386q-3 20-4.5 40t-1.5 40q0 20 1.5 40t4.5 40h134v80H404q12 43 31 82.5t45 75.5q20 0 40-2.5t40-4.5v82q-20 2-40 4.5T480-80ZM170-400h136q-3-20-4.5-40t-1.5-40q0-20 1.5-40t4.5-40H170q-5 20-7.5 40t-2.5 40q0 20 2.5 40t7.5 40Zm34-240h118q9-37 22.5-72.5T376-782q-55 18-99 54.5T204-640Zm172 462q-18-34-31.5-69.5T322-320H204q29 51 73 87.5t99 54.5Zm28-462h152q-12-43-31-82.5T480-798q-26 36-45 75.5T404-640Zm234 0h118q-29-51-73-87.5T584-782q18 34 31.5 69.5T638-640Z"/></svg>
                                                            </a>
                                                            <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal remove__btn" id_remove="{{$history->id}}" type_remove="history">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m376-300 104-104 104 104 56-56-104-104 104-104-56-56-104 104-104-104-56 56 104 104-104 104 56 56Zm-96 180q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520Zm-400 0v520-520Z"/></svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td></td>
                                                <td class="main__table-text">Không có dữ liệu</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                <!-- favorites -->
                <div class="row row--grid watch__later__container">
                    @if ($watch_laters->count() > 0)
                        @foreach ($watch_laters as $watch_later)
                            <div class="col-6 col-sm-4 col-lg-3 col-xl-3 item__remove" id_remove="{{$watch_later->id}}" type_remove="watch_later">
                                <div class="card card--favorites">
                                    <a href="{{route('movie',$watch_later->movie->id)}}" class="card__cover">
                                        <img src="{{asset($watch_later->movie->thumbnail)}}" alt="" />
                                        <svg
                                            width="22"
                                            height="22"
                                            viewBox="0 0 22 22"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </a>
                                    <a href="#modal-delete" class="card__add open-modal remove__btn" type="button" id_remove="{{$watch_later->id}}" type_remove="watch_later">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m376-300 104-104 104 104 56-56-104-104 104-104-56-56-104 104-104-104-56 56 104 104-104 104 56 56Zm-96 180q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520Zm-400 0v520-520Z"/></svg>
                                    </a>
                                    <span class="card__rating"
                                        ><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                                        {{$watch_later->movie->views}}</span
                                    >
                                    <h3 class="card__title">
                                        <a href="{{route('movie',$watch_later->movie->id)}}"
                                            >{{$watch_later->movie->title}}</a
                                        >
                                    </h3>
                                    <ul class="card__list">
                                        <li>{{$watch_later->movie->category->name}}</li>
                                        <li>{{$watch_later->movie->release_year}}</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            
                    @else
                        <p style="width:100%;margin:20px 0 0;color:#fff;text-align:center">Không có dữ liệu</p>
                    @endif
                </div>
                <!-- end favorites -->
            </div>

            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="sign__wrap">
                            <div class="row">
                                <!-- details form -->
                                <div class="col-12 col-lg-6">
                                    <form
                                        action="/profile/update"
                                         method="POST" enctype="multipart/form-data"
                                        class="sign__form sign__form--profile sign__form--first"
                                    >
                                    @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="sign__title">
                                                    Hồ sơ chi tiết
                                                </h4>
                                            </div>

                                            <div
                                                class="col-12 col-md-6 col-lg-12 col-xl-6"
                                            >
                                                <div
                                                    class="sign__group"
                                                >
                                                    <label
                                                        class="sign__label"
                                                        for="username"
                                                        >Tên</label
                                                    >
                                                    <input
                                                        id="username"
                                                        type="text"
                                                        name="name"
                                                        class="sign__input"
                                                        value="{{$user->name}}"
                                                    />
                                                    @error('name')
                                                        <p class="error" style="color:#df4a32;">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div
                                                class="col-12 col-md-6 col-lg-12 col-xl-6"
                                            >
                                                <div
                                                    class="sign__group"
                                                >
                                                    <label
                                                        class="sign__label"
                                                        for="email"
                                                        >Email</label
                                                    >
                                                    <input
                                                        id="email"
                                                        type="text"
                                                        name="email" disabled
                                                        class="sign__input"
                                                        value="{{$user->email}}"
                                                    />
                                                </div>
                                            </div>

                                            <div
                                                class="col-12 col-md-6 col-lg-12 col-xl-6"
                                            >
                                                <div
                                                    class="sign__group"
                                                >
                                                    <label
                                                        class="sign__label"
                                                        for="firstname"
                                                        >Ảnh hiện tại: </label
                                                    >
                                                    <img id="current_image" style="margin-left: 20px"
                                                    src=" {{ $user->image }}"
                                                    alt="Ảnh hiện tại của người dùng" width="60">
                                                </div>
                                            </div>

                                            <div
                                                class="col-12 col-md-6 col-lg-12 col-xl-6"
                                            >
                                                <div
                                                    class="sign__group"
                                                >
                                                    <label
                                                        class="sign__label"
                                                        for="lastname"
                                                        >Chọn ảnh mới</label
                                                    >
                                                    <input
                                                        id="lastname"
                                                        type="file"
                                                        name="image"
                                                        class="sign__input"
                                                    />
                                                    @error('image')
                                                        <p class="error" style="color:#df4a32;">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button
                                                    class="sign__btn"
                                                    type="submit"
                                                >
                                                    Lưu
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- end details form -->

                                <!-- password form -->
                                <div class="col-12 col-lg-6">
                                    <form
                                        action="/profile/changePassword"
                                        method="POST"
                                        class="sign__form sign__form--profile"
                                    >
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="sign__title">Thay đổi mật khẩu</h4>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="current_password">Mật khẩu cũ</label>
                                                    <input
                                                        id="current_password"
                                                        type="password"
                                                        name="current_password"
                                                        class="sign__input"
                                                    />
                                                    @error('current_password')
                                                        <p class="error" style="color:#df4a32;">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="new_password">Mật khẩu mới</label>
                                                    <input
                                                        id="new_password"
                                                        type="password"
                                                        name="password"
                                                        class="sign__input"
                                                    />
                                                    @error('password')
                                                        <p class="error" style="color:#df4a32;">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                <div class="sign__group">
                                                    <label class="sign__label" for="new_password_confirmation">Nhập lại mật khẩu mới</label>
                                                    <input
                                                        id="new_password_confirmation"
                                                        type="password"
                                                        name="password_confirmation"
                                                        class="sign__input"
                                                    />
                                                    @error('password_confirmation')
                                                        <p class="error" style="color:#df4a32;">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button
                                                    class="sign__btn"
                                                    type="submit"
                                                    name="action"
                                                    value="change_password"
                                                >
                                                    Đổi mật khẩu
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- end password form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content tabs -->
    </div>
</div>
<!-- end profile -->

<!-- modal logout -->
<div id="modal-logout" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Đăng xuất</h6>

    <p class="modal__text">Bạn có muốn đăng xuất không?</p>

    <div class="modal__btns">
       <a href="{{route('logout')}}" class="modal__btn modal__btn">Có</a>
       <button class="modal__btn modal__btn--dismiss" type="button">Không</button>
    </div>
  </div>
  <!-- end modal logout -->
<!-- modal delete -->
<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Xóa mục</h6>

    <p class="modal__text">Bạn có chắc chắn muốn xóa mục này không?</p>

    <div class="modal__btns">
       <button class="modal__btn modal__btn--apply" id="modal__remove__btn" type="button">Xóa</button>
       <button class="modal__btn modal__btn--dismiss" type="button">Bỏ qua</button>
    </div>
  </div>
  <!-- end modal delete -->
 @endsection
 <!-- end partners -->
