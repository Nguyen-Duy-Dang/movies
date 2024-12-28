<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css')}}">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Itim&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
		rel="stylesheet">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/admin.css')}}">

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{asset('images/storage/logo.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{asset('images/storage/logo.png')}}">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>Đum Đúm – Phim & Chương trình truyền hình, Mẫu HTML rạp chiếu phim trực tuyến</title>

</head>

<body>
	<!-- tiêu đề -->
	<header class="header">
		<div class="header__content">
			<!-- logo tiêu đề -->
			<a href="{{route("index")}}" class="header__logo">
				<img src="{{asset('images/storage/logo.png')}}" alt="">
			</a>
			<!-- kết thúc logo tiêu đề -->

			<!-- nút menu tiêu đề -->
			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<!-- kết thúc nút menu tiêu đề -->
		</div>
	</header>
	<!-- kết thúc tiêu đề -->

	<!-- thanh bên -->
	<div class="sidebar">
		<!-- logo thanh bên -->
		<a href="/" class="sidebar__logo">
			<img src="{{asset('images/storage/logo.png')}}" alt="">
		</a>
		<!-- kết thúc logo thanh bên -->

		<!-- người dùng thanh bên -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="{{auth()->user()->image}}" alt="">
			</div>

			<div class="sidebar__user-title">
				@if (auth()->user()->role == "admin")
					<span>Quản trị viên</span>
				@else
					<span>Nhân viên</span>
				@endif
				<p>{{auth()->user()->name}}</p>
			</div>

			<a class="sidebar__user-btn" href="{{route("index")}}">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"/></svg>
			</a>
		</div>

		<!-- kết thúc người dùng thanh bên -->

		<!-- thanh điều hướng bên -->
		<ul class="sidebar__nav">
			<li class="sidebar__nav-item">
				<a data-toggle="collapse" href="#collapseMenuCategory" @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "category"])><svg xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 24 24">
						<path
							d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z" />
					</svg> <span>Danh mục</span></a>
				<ul @class(['collapse sidebar__menu', 'show' => $selected == "category"]) id="collapseMenuCategory">
					<li><a href="/admin/category/list">Danh sách</a></li>
					<li><a href="/admin/category/add">Thêm</a></li>
				</ul>
			</li>

			<li class="sidebar__nav-item">
				<a @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "movie"])
					data-toggle="collapse" href="#collapseMenuMovie" role="button" aria-expanded="false"
					aria-controls="collapseMenu"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
						viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
						<path
							d="m160-800 80 160h120l-80-160h80l80 160h120l-80-160h80l80 160h120l-80-160h120q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800Zm0 240v320h640v-320H160Zm0 0v320-320Z" />
					</svg><span>Phim</span></a>
				<ul @class(['collapse sidebar__menu', 'show' => $selected == "movie"]) id="collapseMenuMovie">
					<li><a href="/admin/movie/list">Danh sách</a></li>
					<li><a href="/admin/movie/add">Thêm</a></li>
				</ul>
			</li>

			<li class="sidebar__nav-item">
				<a @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "user"]) data-toggle="collapse"
					href="#collapseMenuUser" role="button" aria-expanded="false" aria-controls="collapseMenu"><svg
						xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						<path
							d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
					</svg><span>Người dùng</span></a>
				<ul @class(['collapse sidebar__menu', 'show' => $selected == "user"]) id="collapseMenuUser">
					<li><a href="/admin/user/list">Danh sách</a></li>
					<li><a href="{{route('admin.employee.list')}}">Quản lý nhân viên</a></li>
				</ul>
			</li>

			<li class="sidebar__nav-item">
				<a @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "comment"]) href="{{route('admin.comment.list')}}" >
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						<path
							d="M8,11a1,1,0,1,0,1,1A1,1,0,0,0,8,11Zm4,0a1,1,0,1,0,1,1A1,1,0,0,0,12,11Zm4,0a1,1,0,1,0,1,1A1,1,0,0,0,16,11ZM12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,.3-.71,1,1,0,0,0-.3-.7A8,8,0,1,1,12,20Z" />
					</svg>
					<span>Bình luận</span>
				</a>
			</li>

			<li class="sidebar__nav-item">
				<a @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "comment_filter"])
					data-toggle="collapse" href="#collapseMenuCommentFilter" role="button" aria-expanded="false"
					aria-controls="collapseMenu">
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
						fill="#e8eaed">
						<path
							d="M440-160q-17 0-28.5-11.5T400-200v-240L168-736q-15-20-4.5-42t36.5-22h560q26 0 36.5 22t-4.5 42L560-440v240q0 17-11.5 28.5T520-160h-80Zm40-308 198-252H282l198 252Zm0 0Z" />
					</svg><span>Lọc bình luận</span></a>
				<ul @class(['collapse sidebar__menu', 'show' => $selected == "comment_filter"])
					id="collapseMenuCommentFilter">
					<li><a href="{{route('admins.comment_filter.list')}}">Danh sách</a></li>
					<li><a href="{{route('admins.comment_filter.add')}}">Thêm</a></li>
				</ul>
			</li>

			<li class="sidebar__nav-item">
				<a @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "statistic"]) href="{{route('admin.statistic.list')}}">
					<svg xmlns="http://www.w3.org/2000/svg" height="24px"
						viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
						<path d="M640-160v-280h160v280H640Zm-240 0v-640h160v640H400Zm-240 0v-440h160v440H160Z" />
					</svg><span>Thống kê</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "slides"])
					data-toggle="collapse" href="#collapseMenuSlides" role="button" aria-expanded="false"
					aria-controls="collapseMenu"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
						viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
						<path
							d="m380-300 280-180-280-180v360ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z" />
					</svg><span>Slides</span></a>
				<ul @class(['collapse sidebar__menu', 'show' => $selected == "slide"]) id="collapseMenuSlides">
					<li><a href="{{route('admin.slide.list')}}">Danh sách</a></li>
					<li><a href="{{route('admin.slide.add')}}">Thêm</a></li>
				</ul>
			</li>

			<li class="sidebar__nav-item">
				<a @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "pay"]) data-toggle="collapse"
					href="#collapseMenuPay" role="button" aria-expanded="false" aria-controls="collapseMenu"><svg
						xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
						fill="#e8eaed">
						<path
							d="M560-440q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM280-320q-33 0-56.5-23.5T200-400v-320q0-33 23.5-56.5T280-800h560q33 0 56.5 23.5T920-720v320q0 33-23.5 56.5T840-320H280Zm80-80h400q0-33 23.5-56.5T840-480v-160q-33 0-56.5-23.5T760-720H360q0 33-23.5 56.5T280-640v160q33 0 56.5 23.5T360-400Zm440 240H120q-33 0-56.5-23.5T40-240v-440h80v440h680v80ZM280-400v-320 320Z" />
					</svg><span>Thanh toán</span></a>
				<ul @class(['collapse sidebar__menu', 'show' => $selected == "pay"]) id="collapseMenuPay">
					<li><a href="{{route('admin.payment.list')}}">Danh sách</a></li>
					<li><a href="{{route('admin.payment.add')}}">Thêm</a></li>
				</ul>
			</li>

			<li class="sidebar__nav-item">
				<a @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "notification"]) data-toggle="collapse" href="#collapseMenuNotification" role="button" aria-expanded="false" aria-controls="collapseMenu"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg><span> Thông báo</span></a>
				<ul @class(['collapse sidebar__menu', 'show' => $selected == "notification"]) id="collapseMenuNotification">
					<li><a href="{{route('admin.notification.list')}}">Danh sách</a></li>
					<li><a href="{{route('admin.notification.add')}}">Thêm</a></li>
				</ul>
			</li>

			<li class="sidebar__nav-item">
				<a href="{{route("admin.trash.list")}}" @class(['sidebar__nav-link', 'sidebar__nav-link--active' => $selected == "trash"])>
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"> <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" /> </svg>
					<span>Thùng rác</span>
				</a>
			</li>
		</ul>
		<!-- kết thúc thanh điều hướng bên -->


	</div>
	<!-- kết thúc thanh bên -->
	<!-- nội dung chính -->
	<main class="main">
		@yield('content')
	</main>
	<!-- kết thúc nội dung chính -->
	<div class="message__container">
		@include('layouts.shared.message')
	</div>
	@include('layouts.shared.loader')
	<!-- JS -->
	<script src="{{asset("js/jquery-3.5.1.min.js")}}"></script>
	<script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>
	<script src="{{asset("js/jquery.magnific-popup.min.js")}}"></script>
	<script src="{{asset("js/smooth-scrollbar.js")}}"></script>
	<script src="{{asset("js/select2.min.js")}}"></script>
	<script src="{{asset("js/admin.js")}}"></script>
</body>

</html>
