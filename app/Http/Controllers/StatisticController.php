<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    public function movie(){
        return view("admins.statistic.movie", ["selected" => "statistic"]);
    }
    public function list(){
        $backgroundColors = [];

        $payments = DB::table("payments")
        ->select(
        DB::raw("MONTH(date) as month"), // Lấy tháng từ date
            DB::raw("SUM(amount) as total_amount") // Tính tổng amount
        )
        ->groupBy(DB::raw("MONTH(date)")) // Nhóm theo tháng
        ->orderBy(DB::raw("MONTH(date)"), 'asc') // Sắp xếp theo tháng
        ->get();

        // Tạo dữ liệu cho Chart.js
        $budgetData__data = [];
        $budgetLabels = range(1, 12); // 12 tháng trong năm

        // Đưa dữ liệu vào đúng tháng, các tháng không có dữ liệu sẽ là 0
        foreach ($budgetLabels as $month) {
            $payment = $payments->firstWhere('month', $month);
            $budgetData__data[] = $payment ? $payment->total_amount : 0;
            $backgroundColors[] = '#' . dechex(rand(0x000000, 0xFFFFFF));
        }

        $budgetData = [
            'labels' => $budgetLabels,
            'datasets' => [
                [
                    'label' => 'Doanh thu',
                    'data' => $budgetData__data,
                    'backgroundColor' => '#1da1f2',
                    'borderColor' => '#8fd4ff',
                    'borderWidth' => 1
                ]
            ]
        ];

        // Nhóm theo premium và đếm số lượng
        $users = DB::table("users")
        ->select(
            DB::raw("premium"), // Lấy giá trị premium
            DB::raw("COUNT(*) as total") // Đếm số lượng người dùng
        )
        ->groupBy("premium") // Nhóm theo premium
        ->get();

        // Tạo dữ liệu cho Chart.js
        $premiumLabels = ["Thường", "Premium"];
        $premiumUserData__data = [0, 0]; // Khởi tạo số liệu

        // Cập nhật dữ liệu theo kết quả truy vấn
        foreach ($users as $user) {
            if ($user->premium == 0) {
                $premiumUserData__data[0] = $user->total; // Người dùng thường
            } elseif ($user->premium == 1) {
                $premiumUserData__data[1] = $user->total; // Người dùng Premium
            }
            $backgroundColors[] = '#' . dechex(rand(0x000000, 0xFFFFFF));
        }

        // Dữ liệu cho biểu đồ
        $premiumUserData = [
        'labels' => $premiumLabels,
        'datasets' => [
            [
                'label' => 'Người dùng',
                'data' => $premiumUserData__data,
                'backgroundColor' => [
                    '#1da1f2', // Màu nền cho "Thường"
                    '#ffc312', // Màu nền cho "Premium"
                ],
                'borderColor' => [
                    '#8fd4ff', // Viền cho "Thường"
                    '#ffe596', // Viền cho "Premium"
                ],
                'borderWidth' => 1,
                'hoverOffset' => 4
            ]
        ]
        ];

        $topMovies = DB::table('likes')
        ->select(
            'id_movie', // Lấy ID của bộ phim
            DB::raw('COUNT(*) as total_likes') // Đếm số lượt like cho mỗi phim
        )
        ->groupBy('id_movie') // Nhóm theo ID phim
        ->orderByDesc('total_likes') // Sắp xếp theo số lượt like giảm dần
        ->limit(10) // Lấy top 10 phim
        ->get();
        // Lấy thông tin phim
        $movies = Movies::whereIn('id', $topMovies->pluck('id_movie'))->get();

        // Mảng lưu tên phim và số lượt like
        $movieLabels = [];
        $movieLikes = [];

        foreach ($topMovies as $topMovie) {
            $movie = $movies->firstWhere('id', $topMovie->id_movie);
            $movieLabels[] = $movie ? $movie->title : 'Unknown'; // Tên phim
            $movieLikes[] = $topMovie->total_likes; // Số lượt like
            $backgroundColors[] = '#' . dechex(rand(0x000000, 0xFFFFFF));
        }

        // Dữ liệu cho biểu đồ
        $movieLikeData = [
            'labels' => $movieLabels,
            'datasets' => [
                [
                    'label' => 'Lượt thích phim',
                    'data' => $movieLikes,
                    'backgroundColor' =>  $backgroundColors, // Màu nền cho biểu đồ
                    'borderWidth' => 1,
                    'hoverOffset' => 4
                ]
            ]
        ];

        $moviesByCategory = DB::table('movies')
        ->join('categories', 'movies.id_category', '=', 'categories.id') // Kết nối với bảng categories
        ->select(
            'categories.name as category_name', // Lấy tên danh mục
            DB::raw('COUNT(movies.id) as total_movies') // Đếm số lượng phim theo danh mục
        )
        ->groupBy('categories.name') // Nhóm theo tên danh mục
        ->get();

        // Tạo dữ liệu cho biểu đồ
        $categoryLabels = [];
        $categoryMovieCounts = [];

        foreach ($moviesByCategory as $category) {
            $categoryLabels[] = $category->category_name; // Lấy tên danh mục
            $categoryMovieCounts[] = $category->total_movies; // Số lượng phim trong danh mục
            $backgroundColors[] = '#' . dechex(rand(0x000000, 0xFFFFFF));
        }

        // Dữ liệu cho biểu đồ
        $categoryMovieData = [
            'labels' => $categoryLabels,
            'datasets' => [
                [
                    'label' => 'Số lượng phim theo danh mục',
                    'data' => $categoryMovieCounts,
                    'backgroundColor' =>  $backgroundColors, // Màu nền cho biểu đồ
                    'borderWidth' => 1,
                    'hoverOffset' => 4
                ]
            ]
        ];


        return view("admins.statistic.list", [
            "selected" => "statistic",
            "budgetData" => $budgetData,
            "premiumUserData" => $premiumUserData,
            "categoryMovieData" => $categoryMovieData,
            "movieLikeData" => $movieLikeData,
        ]);
    }
}
