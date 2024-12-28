@extends('layouts.layout')
@section('content')
        <!-- home -->
        @if ($slides->count() > 0)
        <div class="home home--static">
            <div class="home__carousel owl-carousel" id="flixtv-hero">
                @foreach ($slides as $slide)
                    <div class="home__card">
                        <a href="{{route("movie",$slide->id_movie)}}">
                            <img class="not__lazy" src="{{asset($slide->image)}}" alt="" />
                        </a>
                        <div>
                            <h2>{{$slide->movie->title}}</h2>
                            <ul>
                               @foreach ($categories as $category)
                                   @if ($slide->movie->id_category == $category->id)
                                       <li>{{$category->name}}</li>
                                   @endif
                               @endforeach
                                <li>{{$slide->movie->release_year}}</li>
                            </ul>
                        </div>
                        <button title="Thêm vào danh sách xem sau" 
                                class="home__add watch__later__button {{ in_array($slide->movie->id, $watch_later_movies) ? 'active' : '' }} {{(!auth()->check() ? 'isLogin__false' : '')}}" 
                                id_movie="{{ $slide->movie->id }}" 
                                type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/>
                            </svg>
                        </button>
                
                        <span class="home__rating"
                            ><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                            {{$slide->movie->views}}</span
                        >
                    </div>
                @endforeach
            </div>

            <button
                class="home__nav home__nav--prev"
                data-nav="#flixtv-hero"
                type="button"
            ><img class="not__lazy" src="{{asset("images/storage/Prev-button.svg")}}" alt=""></button>
            <button
                class="home__nav home__nav--next"
                data-nav="#flixtv-hero"
                type="button"
            ><img class="not__lazy" src="{{asset("images/storage/Next-button.svg")}}" alt=""></button>
        </div>
        @endif
            <!-- end home -->

        <!-- catalog -->
        <div class="catalog">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title__movie">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M360-120v-720h80v720h-80Zm160-160v-400l200 200-200 200Z"/></svg>
                            Có thể bạn sẽ thích
                        </div>

                        <div class="row row--grid">
                            @foreach ($movies as $index => $movie)
                                @if ($index < 8)
                                    <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                                        <div class="card">

                                            <a href="{{route('movie',$movie->id)}}" class="card__cover">
                                                <img src="{{ asset($movie->thumbnail) }}" alt="" />
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
                                            {{-- <button class="card__add" type="button">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"
                                                    />
                                                </svg>
                                            </button> --}}
                                            {{-- <span class="card__rating"
                                                ><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"
                                                    />
                                                </svg>
                                                8.3</span
                                            > --}}
                                            <h3 class="card__title">
                                                <a href="{{route('movie',$movie->id)}}" >{{$movie->title}}</a>
                                            </h3>
                                            <ul class="card__list">
                                            <li>{{$movie->category ? $movie->category->name : 'Không có danh mục'}}</li>
                                                <li>{{$movie->release_year}}</li>
                                            </ul>


                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{route('allMovie')}}" class="catalog__more" type="button">
                            Xem thêm
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end catalog -->
      
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">Phim bộ</h2>
                    </div>
                    <div class="col-12">

                        <div class="section__carousel-wrap">
                            <div class="section__carousel owl-carousel" id="seriesMovies">
                                @foreach ($movies as $movie)
                                    @if ($movie->isSeries)
                                    {{-- <div class="col-6 col-sm-4 col-lg-3 col-xl-3"> --}}
                                        <div class="card">
    
                                            <a href="{{route('movie',$movie->id)}}" class="card__cover">
                                                <img src="{{ asset($movie->thumbnail) }}" alt="" />
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
                                            <h3 class="card__title">
                                                <a href="{{route('movie',$movie->id)}}" >{{$movie->title}}</a>
                                            </h3>
                                            <ul class="card__list">
                                            <li>{{$movie->category ? $movie->category->name : 'Không có danh mục'}}</li>
                                                <li>{{$movie->release_year}}</li>
                                            </ul>
    
    
                                        </div>
                                    {{-- </div> --}}
                                    @endif
                                @endforeach

                            </div>

                            <button
                                class="section__nav section__nav--cards section__nav--prev"
                                data-nav="#seriesMovies"
                                type="button"
                            >
                                <svg
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M1.25 7.72559L16.25 7.72559"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                            <button
                                class="section__nav section__nav--cards section__nav--next"
                                data-nav="#seriesMovies"
                                type="button"
                            >
                                <svg
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M15.75 7.72559L0.75 7.72559"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">Phim lẻ</h2>
                    </div>
                    <div class="col-12">

                        <div class="section__carousel-wrap">
                            <div class="section__carousel owl-carousel" id="notSeriesMovies">
                                @foreach ($movies as $movie)
                                    @if (!$movie->isSeries)
                                    {{-- <div class="col-6 col-sm-4 col-lg-3 col-xl-3"> --}}
                                        <div class="card">
    
                                            <a href="{{route('movie',$movie->id)}}" class="card__cover">
                                                <img src="{{ asset($movie->thumbnail) }}" alt="" />
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
                                            <h3 class="card__title">
                                                <a href="{{route('movie',$movie->id)}}" >{{$movie->title}}</a>
                                            </h3>
                                            <ul class="card__list">
                                            <li>{{$movie->category ? $movie->category->name : 'Không có danh mục'}}</li>
                                                <li>{{$movie->release_year}}</li>
                                            </ul>
    
    
                                        </div>
                                    {{-- </div> --}}
                                    @endif
                                @endforeach

                            </div>

                            <button
                                class="section__nav section__nav--cards section__nav--prev"
                                data-nav="#notSeriesMovies"
                                type="button"
                            >
                                <svg
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M1.25 7.72559L16.25 7.72559"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M7.2998 1.70124L1.2498 7.72524L7.2998 13.7502"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                            <button
                                class="section__nav section__nav--cards section__nav--next"
                                data-nav="#notSeriesMovies"
                                type="button"
                            >
                                <svg
                                    width="17"
                                    height="15"
                                    viewBox="0 0 17 15"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M15.75 7.72559L0.75 7.72559"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M9.7002 1.70124L15.7502 7.72524L9.7002 13.7502"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- plan -->
        <section class="section section--pb0 section--gradient">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">Mua gói Premium ngay</h2>
                        <p class="section__text">
                            Không có phí phát sinh thêm
                        </p>
                    </div>
                </div>

                <div class="row">
                    @foreach ($subscription_plans as $index => $subscription_plan)
                    @if ($index + 1 == 2)
                        <div class="col-12 col-xl-4 order-md-1 order-xl-2">
                    @else
                        <div class="col-12 col-md-6 col-xl-4 order-md-2 order-xl-{{$index + 1}}">
                    @endif
                            <div @class(['plan', 'plan--best' => $index + 1 == 2])>
                                <h3 class="plan__title">
                                    {{$subscription_plan->name}}
                                </h3>
                                <ul class="plan__list">
                                    <li class="green">
                                        <svg
                                            width="19"
                                            height="14"
                                            viewBox="0 0 19 14"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1.43994 6.95981L6.77477 12.2924L17.4399 1.62723"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                        Xem phim độ phân giải 1080p!
                                    </li>
                                    <li class="green">
                                        <svg
                                            width="19"
                                            height="14"
                                            viewBox="0 0 19 14"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1.43994 6.95981L6.77477 12.2924L17.4399 1.62723"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                        Tải phim độ phân giải 1080p!
                                    </li>
                                    <li class="green">
                                        <svg
                                            width="19"
                                            height="14"
                                            viewBox="0 0 19 14"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1.43994 6.95981L6.77477 12.2924L17.4399 1.62723"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                        Huy hiệu đặc biệt
                                    </li>
                                </ul>
                                <span class="plan__price">{{number_format($subscription_plan->price, 0, ',', '.')}} VND<span>/{{$subscription_plan->duration}} Ngày</span></span
                                >
                                <a href="{{route('subscription', ["plan" => $index])}}" class="plan__btn" type="button">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('subscription')}}" class="catalog__more" type="button">
                            Xem thêm
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end plan -->

        <!-- footer -->
@endsection

