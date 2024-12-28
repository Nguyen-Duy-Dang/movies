<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Requests\Validate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{
    public function get_by_movie($id_movie,$id_episode){
        $movie = Movies::with('category')->find($id_movie);

        $servers = DB::table('urls')
        ->select('source')
        ->where("type", 'episode')
        ->where('media_id', $id_episode)
        ->distinct()
        ->get();

        $server_selected = $urls = DB::table("urls")->where("media_id", $id_episode)->first()->source;
        if(request("server")){
            $server_selected = request("server");
        }

        $urls = DB::table("urls")
        ->select("*")
        ->where("media_id", $id_episode)
        ->where("type", 'episode')
        ->where("source",$server_selected)
        ->orderBy("resolution","asc")
        ->get();
        
        $episodes = DB::table("episodes")->select("*")->where("id_movie", $id_movie)->orderBy("episode","asc")->get();
        
        $episode_focus = DB::table("episodes")->select("*")->where("id", $id_episode)->first();
        
        $id_category = DB::table("movies")
        ->select("id_category")
        ->where("id",$id_movie)
        ->first();

        $similars = DB::table("movies")
        ->select("*")
        ->where("id_category", $id_category->id_category)
        ->where('status',1)
        ->where('isDeleted',0)
        ->get();

        if(auth()->check()){
            $check_watch_later = DB::table("watch_laters")->where("id_movie",$movie->id)->where("id_user",auth()->user()->id)->count();
        }else{
            $check_watch_later = 0;
        } 

        if(auth()->check()){
            $check_like = DB::table("likes")->where("id_movie",$movie->id)->where("id_user",auth()->user()->id)->count();
        }else{
            $check_like = 0;
        } 

         
        $likes = DB::table("likes")
        ->select("*")
        ->where("id_movie", $id_movie)
        ->count();
        
        $categories = DB::table("categories")
        ->get();

        $comments = Comments::with("user", "reply_comments")
        ->where("id_movie", $id_movie)
        ->orderBy("created_at", "desc");
        $comments_count =  $comments->count();
        $comments =  $comments->paginate(5);

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
            "episode_focus" => $episode_focus,
            "comments_count" => $comments_count,
            "comments" => $comments,
            "check_like" => $check_like,
            "check_watch_later" => $check_watch_later,
            "watch_later_movies" => $watch_later_movies
        ]);
    }
    public function admin__add($id_movie){
        $episodes = DB::table("episodes")->where("id_movie",$id_movie)->orderBy('episode','asc')->get();
        return view('admins.movie.episode.add', [
            "episodes" => $episodes,
            "movie" => $id_movie,
            "selected" => "movie"
        ]);
    }
    public function admin__update__form($id){
        $episodeQuery = DB::table("episodes")->where("id",$id);
        $id_movie = $episodeQuery->value("id_movie");
        $episode = $episodeQuery->first();
        $urls = DB::table("urls")->where("type","episode")->where("media_id",$id)->get();
        return view('admins.movie.episode.update', [
            "episode" => $episode,
            "urls" => $urls,
            "movie" => $id_movie,
            "selected" => "movie"
        ]);
    }
    public function admin__create(Validate $request , $movie){
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

        $episodeId = DB::table('episodes')->insertGetId([
            'episode' => $request->input('episode'),
            'id_movie' => $movie
        ]);

        foreach ($urls as $index => $url) {
            if ($url) {
               DB::table('urls')->insert([
                    'url' => $url,
                    'resolution' => $resolutions[$index],
                    'type' => 'episode',
                    'premium' => $premiums[$index] ?? null,
                    'media_id' => $episodeId,
                    'source' => $servers[$index] 
                ]);
            }
        }
    
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => 'Thêm tập phim thành công!'
        ]);
    }

    public function admin__delete($id){
        DB::table("episodes")->where("id",$id)->delete();
        $url = DB::table("urls")->where("type","episode")->where("media_id",$id);
        $videoPath =  parse_url($url->value("url"), PHP_URL_PATH);
        Storage::disk('s3')->delete($videoPath);
        $url->delete();

        return response()->json([
            "success" => true
        ]);
    }

    public function admin__update(Request $request, $id) {
        $urls = $request->input('urls', []);
        $url_ids = $request->input('url_ids', []);  
        $premiums = $request->input('premiums', []);
        $resolutions = $request->input('resolutions', []);
        $servers = $request->input('servers', []);
        
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
        
        $episode = DB::table('episodes')->where('id', $id)->first();
    
        if (!$episode) {
            return response()->json(['success' => false, 'message' => 'Tập phim không tồn tại!'], 404);
        }
    
        DB::table('episodes')->where('id', $id)->update([
            'episode' => $request->input('episode')
        ]);
    
        // Lấy danh sách URL hiện có
        $existingUrls = DB::table('urls')->where('type', 'episode')->where('media_id', $id)->get();
    
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
                // Cập nhật URL nếu $url_id tồn tại
                $oldVideoPath = parse_url(DB::table('urls')->where("id",$url_ids[$index])->value("url"),PHP_URL_PATH);
                if (Storage::disk('s3')->exists($oldVideoPath)) {
                    Storage::disk('s3')->delete($oldVideoPath);
                }
                DB::table('urls')->where('id', $url_ids[$index])->update([
                    'url' => $url,
                    'resolution' => $resolutions[$index],
                    'premium' => $premiums[$index],
                    'source' => $servers[$index],
                    'type' => 'episode',
                    'media_id' => $id,
                ]);
            } else {
                // Thêm mới URL nếu không có $url_id
                DB::table('urls')->insert([
                    'url' => $url,
                    'resolution' => $resolutions[$index],
                    'premium' => $premiums[$index],
                    'source' => $servers[$index],
                    'type' => 'episode',
                    'media_id' => $id,
                ]);
            }
        }      
    
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => 'Cập nhật tập phim thành công!'
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
}
