<?php

namespace App\Http\Controllers;

use App\Models\Subscription_plans;
use stdClass;
use App\Models\Movies;
use App\Models\Slides;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Requests\Validate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function get_id($id){
        if(auth()->check()){
            $check_watch_later = DB::table("watch_laters")->where("id_movie",$id)->where("id_user",auth()->user()->id)->count();
            $check_like = DB::table("likes")->where("id_movie",$id)->where("id_user",auth()->user()->id)->count();
            $check_history = DB::table("histories")->where("id_movie",$id)->where("id_user",auth()->user()->id)->count();
            if($check_history > 0){
                DB::table("histories")->where("id_movie",$id)->where("id_user",auth()->user()->id)->delete();
            }
            DB::table("histories")->insert([
                "id_movie" => $id,
                "id_user" => auth()->user()->id
            ]);
        }else{
            $check_watch_later = 0;
            $check_like = 0;
        }

        $movie = Movies::with('category')->find($id);

        $servers = DB::table('urls')
        ->select('source')
        ->where("type", 'movie')
        ->where('media_id', $id)
        ->orderByRaw("FIELD(source, 'server 1', 'server 2', 'server 3')")
        ->distinct()  // Lấy các giá trị khác nhau
        ->get();

        $server_selected = $urls = DB::table("urls")->where("media_id", $id)->first()->source;
        if(request("server")){
            $server_selected = request("server");
        }

        $urls = DB::table("urls")
        ->select("*")
        ->where("media_id", $id)
        ->where("type", 'movie')
        ->where("source",$server_selected)
        ->orderBy("resolution","asc")
        ->get();

        $likes = DB::table("likes")
        ->select("*")
        ->where("id_movie", $id)
        ->count();

        $episodes = DB::table("episodes")
        ->select("*")
        ->where("id_movie", $id)
        ->orderBy("episode","asc")
        ->get();

        $id_category = DB::table("movies")
        ->select("id_category")
        ->where("id",$id)
        ->first();
        // dd($category);
        $similars = DB::table("movies")
        ->select("*")
        ->where("id_category", $id_category->id_category)
        ->where('status',1)
        ->where('isDeleted',0)
        ->get();

        $categories =  DB::table("categories")
        ->select("*")
        ->get();

        $comments = Comments::with("user", "reply_comments")
        ->where("id_movie", $id)
        ->orderBy("created_at", "desc");
        $comments_count =  $comments->count();
        $comments =  $comments->paginate(5);
        // dd($comments_count);
        $episode_focus = new stdClass();
        $episode_focus->episode = 1;
 
        $watch_later_movies = [];
        if (auth()->check()) {
            $watch_later_movies = DB::table("watch_laters")
                ->where("id_user", auth()->user()->id)
                ->pluck("id_movie")
                ->toArray();
        }

        return view("clients.movie",[
            "movie"=>$movie,
            "servers"=>$servers,
            "server_selected"=>$server_selected,
            "urls"=>$urls,
            "likes"=>$likes,
            "episodes"=>$episodes,
            "similars" => $similars,
            "categories" => $categories,
            "comments_count" => $comments_count,
            "comments" => $comments,
            "episode_focus" => $episode_focus,
            "check_like" => $check_like,
            "check_watch_later" => $check_watch_later,
            "watch_later_movies" => $watch_later_movies
        ]);
    }
    public function index(){
        $movies = Movies::with('category')->where("status", 1)->where("isDeleted", 0)->orderBy("created_at","desc")->get();
        $slides = Slides::with('movie')
        ->where('status', 1)
        ->where('isDeleted', 0)
        ->whereHas('movie', function ($query) {
            $query->where('status', 1);
            $query->where('isDeleted', 0);
        })
        ->get();
        $subscription_plans = Subscription_plans::where('isDeleted',0)->limit(3)->get();
        $categories = DB::table("categories")->limit(3)->get();

        $watch_later_movies = [];
        if (auth()->check()) {
            $watch_later_movies = DB::table("watch_laters")
                ->where("id_user", auth()->user()->id)
                ->pluck("id_movie")
                ->toArray();
        }
        return view('clients.HomePage', [
            'movies' => $movies, 
            'slides' => $slides, 
            'subscription_plans' => $subscription_plans, 
            'categories' => $categories,
            "watch_later_movies" => $watch_later_movies
        ]);
    }

    public function admin__view(){
        $movies = Movies::with('category')
        ->where("isDeleted",0)
        ->orderBy("created_at","desc")
        ->paginate(request()->input('per_page', 8), ['*'], 'page', request()->input('page', 1));
        
        return view('admins.movie.list', [
            "movies" => $movies,
            "selected" => "movie"
        ]);
    }
    Public function allMovie(){
        $movies = Movies::with('category')
        ->where("status", 1)
        ->where("isDeleted", 0)
        ->orderBy('created_at', "desc")
        ->get();
        $categories = DB::table("categories")->get();
        $release_years = Movies::distinct()->orderBy("release_year","asc")->pluck("release_year");
        return view('/clients/all', [
            'movies' => $movies,
            'categories' => $categories,
            'release_years' => $release_years,
        ]);
    }
    Public function search(Request $request){
        {
            $search = $request->input('search');
            $movies = Movies::with('category')
                ->where('title', 'LIKE', "%{$search}%")
                ->where("status", 1)
                ->where("isDeleted", 0)
                ->orderBy('created_at', "desc")
                ->get();
            $categories = DB::table("categories")->get();
            $release_years = Movies::distinct()->orderBy("release_year","asc")->pluck("release_year");
            return view('/clients/search', [
                'movies' => $movies,
                'categories' => $categories,
                'release_years' => $release_years,
            ]);
        }
    }

    public function admin__add(){
        $categories = DB::table("categories")->get();
        return view('admins.movie.add', [
            "categories" => $categories,
            "selected" => "movie"
        ]);
    }

    public function admin__update__form($id){
        $movie = DB::table("movies")->where("id",$id)->first();
        $urls =DB::table("urls")->where("type","movie")->where("media_id",$id)->get();
        $categories = DB::table("categories")->get();
        return view('admins.movie.update', [
            "movie" => $movie,
            "urls" => $urls,
            "categories" => $categories,
            "selected" => "movie"
        ]);
    }

    public function admin__remove__url($id){
        $url = DB::table("urls")->where("id",$id);
        $videoPath = $url->value("url");
        $oldVideoPath = parse_url($videoPath, PHP_URL_PATH);
        if(Storage::disk('s3')->delete($oldVideoPath)){
            $url->delete();
            return response()->json([
                "success" => true
            ]);
        }
    }

    public function admin__status__update($id) {
        $show = false;
        $status = DB::table("movies")->where("id", $id)->value("status");
        
        if ($status == 0) {
            DB::table("movies")->where("id", $id)->update([
                "status" => 1
            ]);
            $show = true;
        } else {
            DB::table("movies")->where("id", $id)->update([
                "status" => 0
            ]);
        }
        return response()->json([
            "show" => $show,
            "success" => true
        ]);
    }
    
    public function admin__delete($id){
        $url = DB::table("movies")->where("id",$id)->update([
            "isDeleted" => 1
        ]);
        return response()->json([
            "success" => true
        ]);
    }

    public function admin__create(){        
        $urls = request()->input('urls',[]); 
        $resolutions = request()->input('resolutions',[]); 
        $premiums = request()->input('premiums',[]);
        $servers = request()->input('servers',[]);
       
        $check = false;
        $serverResolutionMap = []; // Mảng để lưu các resolution đã gặp cho mỗi server
        
        foreach ($servers as $index => $server) {
            $resolution = $resolutions[$index] ?? null;
            
            if ($resolution) {
                // Nếu server này chưa có trong mảng, khởi tạo mảng cho server
                if (!isset($serverResolutionMap[$server])) {
                    $serverResolutionMap[$server] = [];
                }
        
                // Kiểm tra nếu resolution đã tồn tại trong server này
                if (in_array($resolution, $serverResolutionMap[$server])) {
                    $check = true;
                    break; // Dừng lặp nếu tìm thấy trùng
                }
        
                // Thêm resolution vào mảng của server này
                $serverResolutionMap[$server][] = $resolution;
            }
        }
        if($check){
            return response()->json([
                'success' => false,
                'status' => 'error',
                'message' => 'Đã có lỗi trùng độ phân giải trong cùng một server!'
            ]);
        }

        $imagePath = "";
        if (request()->hasFile('thumbnail_add')) {
            $image = request()->file('thumbnail_add');
            $uniqueName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'images/thumbnails/' . $uniqueName;
            $image->move(public_path('images/thumbnails'), $uniqueName);
        }

        $movieId = DB::table('movies')->insertGetId([
            'title' => request('title'),
            'thumbnail' => $imagePath,
            'cast' => request('cast'),
            'director' => request('director'),
            'release_year' => request('release_year'),
            'country' => request('country'),
            'description' => request('description'),
            'status' => request('status'),
            'id_category' => request('id_category'),
            'duration' => request('duration'),
            'isSeries' => request('isSeries')
        ]);

        foreach ($urls as $index => $url) {
            if ($url) {
                DB::table('urls')->insert([
                    'url' => $url,
                    'resolution' => $resolutions[$index],
                    'type' => 'movie',
                    'premium' => $premiums[$index] ?? null,
                    'media_id' => $movieId,
                    'source' => $servers[$index] 
                ]);
            }
        }
    
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => 'Thêm phim thành công!'
        ]);
    }

    public function admin__update(Request $request, $id) {
        $urls = $request->input('urls', []);
        $url_ids = $request->input('url_ids', []);  
        $premiums = $request->input('premiums', []);
        $resolutions = $request->input('resolutions', []);
        $servers = $request->input('servers', []);
    
        $movie = DB::table('movies')->where('id', $id)->first();
    
        if (!$movie) {
            return response()->json(['success' => false, 'message' => 'Phim không tồn tại!'], 404);
        }
    
        // Xử lý ảnh thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($movie->thumbnail && file_exists(public_path($movie->thumbnail))) {
                unlink(public_path($movie->thumbnail)); 
            }
            $image = $request->file('thumbnail');
            $uniqueName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'images/thumbnails/' . $uniqueName;
            $image->move(public_path('images/thumbnails'), $uniqueName);
        } else {
            $imagePath = $movie->thumbnail;
        }
    
        // Cập nhật thông tin phim
        DB::table('movies')->where('id', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'thumbnail' => $imagePath,
            'cast' => $request->input('cast'),
            'director' => $request->input('director'),
            'release_year' => $request->input('release_year'),
            'id_category' => $request->input('id_category'),
            'country' => $request->input('country'),
            'status' => $request->input('status'),
            'duration' => $request->input('duration'),
            'isSeries' => $request->input('isSeries')
        ]);
    
        // Lấy danh sách URL hiện có
        $existingUrls = DB::table('urls')->where('type', 'movie')->where('media_id', $id)->get();
    
        // Xóa URL không còn được sử dụng
        foreach ($existingUrls as $existingUrl) {
            if (!in_array($existingUrl->id, $url_ids)) {
                // Xóa video cũ khỏi S3
                $oldVideoPath = parse_url($existingUrl->url, PHP_URL_PATH);
                if (Storage::disk('s3')->exists($oldVideoPath)) {
                    Storage::disk('s3')->delete($oldVideoPath);
                }
                // Xóa URL khỏi database
                DB::table('urls')->where('id', $existingUrl->id)->delete();
            }
        }
    
        // Cập nhật hoặc chèn URL mới
        foreach ($urls as $index => $url) {
            if (isset($url_ids[$index]) && in_array($url_ids[$index], $existingUrls->pluck('id')->toArray())) {
                // Kiểm tra xem URL có thay đổi hay không
                $existingUrl = DB::table('urls')->where("id", $url_ids[$index])->first();
                if ($existingUrl && $existingUrl->url !== $url) {
                    // Nếu URL đã thay đổi, xóa video cũ khỏi S3
                    $oldVideoPath = parse_url($existingUrl->url, PHP_URL_PATH);
                    if (Storage::disk('s3')->exists($oldVideoPath)) {
                        Storage::disk('s3')->delete($oldVideoPath);
                    }
                }
    
                // Cập nhật URL mới
                DB::table('urls')->where('id', $url_ids[$index])->update([
                    'url' => $url,
                    'resolution' => $resolutions[$index],
                    'premium' => $premiums[$index],
                    'source' => $servers[$index],
                    'type' => 'movie',
                    'media_id' => $id,
                ]);
            } else {
                // Thêm mới URL nếu không có $url_id
                DB::table('urls')->insert([
                    'url' => $url,
                    'resolution' => $resolutions[$index],
                    'premium' => $premiums[$index],
                    'source' => $servers[$index],
                    'type' => 'movie',
                    'media_id' => $id,
                ]);
            }
        }
    
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => 'Cập nhật phim thành công!'
        ]);
    }
    
    
    public function admin__url__add(){
        $url = request('video');
        if(request()->hasFile('video') && request()->file('video')->isValid()){
            $file = request()->file('video');
            $videoPath = $file->store('videos', 's3');
            Storage::disk('s3')->setVisibility($videoPath, 'public');
            $url = Storage::disk('s3')->url($videoPath);
        }
        return response()->json([
            'url' => $url,
            'success' => true
        ] );
    }

    public function admin__remove__all__url(){
        $urls = request()->input('urls',[]); 

        $existingUrls = DB::table('urls')->whereIn('url', $urls)->pluck('url')->toArray();

        $urlsToDelete = array_diff($urls, $existingUrls);

        foreach ($urlsToDelete as $url) {
            $oldVideoPath = parse_url($url, PHP_URL_PATH);
            if (Storage::disk('s3')->exists($oldVideoPath)) {
                Storage::disk('s3')->delete($oldVideoPath);
            }
        }
    }

    public function movie__update__view($id){
        if(!auth()->check()){
            return response()->json([
                "success" => false
            ]);
        }
        DB::table("movies")->where("id", $id)->increment('views',1);
        return response()->json([
            "success" => true
        ]);
    }

    public function movie__filter(Request $request){
        $search = $request->input('search');
        $filter__genres = $request->input('filter__genres');
        $filter__years = $request->input('filter__years');
        $grade = $request->input('grade');

        $movies = Movies::with('category')
        ->where("status",1)
        ->where("isDeleted",0);

        if (!empty($search)) {
            $movies->where("title",'like', "%{$search}%");
        }

        if (!empty($filter__genres)) {
            $movies->where('id_category', $filter__genres); // Lọc theo genre
        }
        
        if (!empty($filter__years)) {
            $movies->where('release_year', $filter__years); // Lọc theo year
        }
        
        if(!empty($grade)){
            if($grade == "featured"){
                $movies->withCount('likes')
                ->orderBy('likes_count', 'desc');
            }elseif($grade == "newest"){
                $movies->orderBy('created_at', "desc"); 
            }else{
                $movies->orderBy('views', "desc"); 
            }
        }

        $movies = $movies->get(); 
        return response()->json([
            "success" => true,
            "movies" => $movies
        ]);
    }
}
