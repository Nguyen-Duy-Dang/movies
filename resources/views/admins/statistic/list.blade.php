@extends('layouts.layout-admin')
@section('content')
    <meta name="budget-data" content='@json($budgetData)'>
    <meta name="premium-data" content='@json($premiumUserData)'>
    <meta name="category-data" content='@json($categoryMovieData)'>
    <meta name="top-movies-data" content='@json($movieLikeData)'>
    <div class="container-fluid container-fluid--statistic">
        <div class="statistic statistic__budget">
            <h1>Doanh thu hàng tháng</h1>
            <canvas id="budgetChart" width="670" height="340"></canvas>
        </div>
        <div class="statistic statistic__budget">
            <h1>Tỉ lệ tài khoản Premium</h1>
            <canvas id="premiumUserChart" width="300" height="300"></canvas>
        </div>
        <div class="statistic statistic__budget">
            <h1>Phim theo danh mục</h1>
            <canvas id="categoryChart" width="330" height="300"></canvas>
        </div>
        <div class="statistic statistic__budget">
            <h1>Top 10 Phim được yêu thích nhất</h1>
            <canvas id="topMoviesChart" width="670" height="300"></canvas>
        </div>
    </div>
@endsection
