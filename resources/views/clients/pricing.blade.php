@extends('layouts.layout')
@section('content')
      <!-- head -->
      <section class="section section--head section--head-fixed">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h1 class="section__title section__title--head">
                        Kế hoạch giá
                    </h1>
                </div>

                <div class="col-12 col-xl-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item">
                            <a href="index.html">Trang chủ</a>
                        </li>
                        <li
                            class="breadcrumb__item breadcrumb__item--active"
                        >
                            Kế hoạch giá
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end head -->

    <!-- features -->
    <div class="section section--pb0">
        <div class="container">
            <div class="row">
                <!-- section text -->
                <div class="col-12">
                    <p class="section__text section__text--small">
                        Chúng tôi cung cấp các gói dịch vụ linh hoạt để đáp
                        ứng nhu cầu giải trí của bạn. Hãy chọn gói phù hợp
                        với nhu cầu xem phim của bạn và tận hưởng kho phim
                        chất lượng cao của chúng tôi mà không bị gián đoạn
                        bởi quảng cáo.
                    </p>
                </div>
                <!-- end section text -->
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
                                ></path>
                            </svg>
                        </span>
                        <h3 class="feature__title">Chọn gói của bạn</h3>
                        <p class="feature__text">
                            Nó để làm một cuốn sách mẫu loại. Nó đã sống sót
                            không chỉ năm thế kỷ, mà còn là bước nhảy vọt
                            vào sắp chữ điện tử, còn lại
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
                                ></path>
                            </svg>
                        </span>
                        <h3 class="feature__title">Chọn gói của bạn</h3>
                        <p class="feature__text">
                            Nếu bạn định sử dụng một đoạn Lorem Ipsum, em
                            cần chắc chắn là không có gì cả lúng túng ẩn ở
                            giữa văn bản
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
                                    d="M20,2H10A3,3,0,0,0,7,5v7a3,3,0,0,0,3,3H20a3,3,0,0,0,3-3V5A3,3,0,0,0,20,2Zm1,10a1,1,0,0,1-1,1H10a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1ZM17.5,8a1.49,1.49,0,0,0-1,.39,1.5,1.5,0,1,0,0,2.22A1.5,1.5,0,1,0,17.5,8ZM16,17a1,1,0,0,0-1,1v1a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V15H4a1,1,0,0,0,0-2H3V12a1,1,0,0,1,1-1A1,1,0,0,0,4,9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H14a3,3,0,0,0,3-3V18A1,1,0,0,0,16,17ZM6,18H7a1,1,0,0,0,0-2H6a1,1,0,0,0,0,2Z"
                                ></path>
                            </svg>
                        </span>
                        <h3 class="feature__title">Chọn gói của bạn</h3>
                        <p class="feature__text">
                            Nó để làm một cuốn sách mẫu loại. Nó đã sống sót
                            không chỉ năm thế kỷ, mà còn là bước nhảy vọt
                            vào sắp chữ điện tử, về cơ bản còn lại
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
                                    d="M21.53,7.15a1,1,0,0,0-1,0L17,8.89A3,3,0,0,0,14,6H5A3,3,0,0,0,2,9v6a3,3,0,0,0,3,3h9a3,3,0,0,0,3-2.89l3.56,1.78A1,1,0,0,0,21,17a1,1,0,0,0,.53-.15A1,1,0,0,0,22,16V8A1,1,0,0,0,21.53,7.15ZM15,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V9A1,1,0,0,1,5,8h9a1,1,0,0,1,1,1Zm5-.62-3-1.5V11.12l3-1.5Z"
                                ></path>
                            </svg>
                        </span>
                        <h3 class="feature__title">Chọn gói của bạn</h3>
                        <p class="feature__text">
                            Nhiều phiên bản khác nhau đã phát triển qua
                            nhiều năm, có khi vô tình, có khi cố ý
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end features -->

    <!-- plan -->
    <div class="section section--pb0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="plans plans--mt0">
                        <div class="table-responsive">
                            <table class="plans__table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <div class="plans__head">
                                                <b>THƯỜNG XUYÊN</b>
                                                <p>$11.99</p>
                                                <span>/ Tháng</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="plans__head">
                                                <b>PREMIUM</b>
                                                <p>$34.99</p>
                                                <span>/ Tháng</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="plans__head">
                                                <b
                                                    >PREMIUM + Kênh truyền
                                                    hình</b
                                                >
                                                <p>$49.99</p>
                                                <span>/ Tháng</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="plans__title"
                                                >Bản gốc của FlixTV</span
                                            >
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="plans__title"
                                                >Nhận quyền truy cập không
                                                giới hạn vào thư viện phát
                                                trực tuyến lớn nhất không có
                                                quảng cáo</span
                                            >
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="plans__title"
                                                >Xem truyền hình trực tiếp
                                                trực tuyến và trên thiết bị
                                                được hỗ trợ</span
                                            >
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="plans__title"
                                                >Chuyển đổi gói hoặc hủy bất
                                                cứ lúc nào</span
                                            >
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="plans__title"
                                                >Ghi truyền hình trực tiếp
                                                với 50 giờ của Cloud DVR
                                                kho</span
                                            >
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--red"
                                            >
                                                <svg
                                                    width="19"
                                                    height="19"
                                                    viewBox="0 0 19 19"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M17.596 1.59982L1.60938 17.5865"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                    <path
                                                        d="M17.601 17.5961L1.60101 1.5928"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="plans__title"
                                                >Phát trực tiếp 65+ hàng
                                                đầu</span
                                            >
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--red"
                                            >
                                                <svg
                                                    width="19"
                                                    height="19"
                                                    viewBox="0 0 19 19"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M17.596 1.59982L1.60938 17.5865"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                    <path
                                                        d="M17.601 17.5961L1.60101 1.5928"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="last">
                                        <td>
                                            <span class="plans__title"
                                                >Kênh truyền hình</span
                                            >
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--red"
                                            >
                                                <svg
                                                    width="19"
                                                    height="19"
                                                    viewBox="0 0 19 19"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M17.596 1.59982L1.60938 17.5865"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                    <path
                                                        d="M17.601 17.5961L1.60101 1.5928"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--red"
                                            >
                                                <svg
                                                    width="19"
                                                    height="19"
                                                    viewBox="0 0 19 19"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M17.596 1.59982L1.60938 17.5865"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                    <path
                                                        d="M17.601 17.5961L1.60101 1.5928"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="plans__status plans__status--green"
                                            >
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
                                                    ></path>
                                                </svg>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button
                                                class="plans__btn"
                                                type="button"
                                            >
                                                Chọn gói
                                            </button>
                                        </td>
                                        <td>
                                            <button
                                                class="plans__btn"
                                                type="button"
                                            >
                                                Chọn gói
                                            </button>
                                        </td>
                                        <td>
                                            <button
                                                class="plans__btn"
                                                type="button"
                                            >
                                                Chọn gói
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end plan -->
@endsection