<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Models\Movies;
use App\Models\Slides;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\Subscription_plans;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TrashController extends Controller
{
    public function admin__view(){
        $movies = Movies::where("isDeleted",1)->get();
        $users = DB::table("users")->where("isDeleted",1)->get();
        $subscription_plans = Subscription_plans::where("isDeleted",1)->get();
        $notifications = Notifications::with('send_user', 'receive_user')
        ->where("isDeleted", 1)
        ->selectRaw('
            MAX(id) as id,
            content,
            MAX(id_send_user) as id_send_user,
            MAX(created_at) as created_at
        ')
        ->groupBy('content') 
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function ($notification) {
            // Truy vấn tất cả người nhận theo content
            $receive_users = Notifications::where('content', $notification->content)
                ->pluck('id_receive_user');  // lấy tất cả id_receive_user

            // Lấy chi tiết của tất cả người nhận
            $notification->receive_users = User::whereIn('id', $receive_users)->get();
            
            return $notification;
        });
        $slides = Slides::where("isDeleted",1)->get();
        return view("admins.trash.list",[
            "movies" => $movies,
            "users" => $users,
            "subscription_plans" => $subscription_plans,
            "notifications" => $notifications,
            "slides" => $slides,
            "selected" => "trash"
        ]);
    }

    public function admin__restore($id_restore){
        $type_trash = request('type_trash');
        
        if($type_trash == "notification"){
            $notificationToRestore = Notifications::find($id_restore);

            if ($notificationToRestore) {       
                $content = $notificationToRestore->content;

                DB::table('notifications')->where('content', $content)->update([
                    "isDeleted" => 0
                ]);
                return response()->json([
                    "success" => true
                ]);
            }
        }

        DB::table("$type_trash" . "s")->where("id",$id_restore)->update([
            "isDeleted" => 0
        ]);
        return response()->json([
            "success" => true
        ]);
    }

    public function admin__movie__remove($id_remove) {
        // Xóa movie
        $movie = DB::table("movies")->where("id", $id_remove)->first();
    
        // Xóa các URL của movie
        $urlsMovie = DB::table("urls")->where("media_id", $id_remove)->where("type", "movie")->get();
        foreach ($urlsMovie as $urlMovie) {
            if ($urlMovie) {
                $moviePath = parse_url($urlMovie->url, PHP_URL_PATH);
                Storage::disk('s3')->delete($moviePath);
                DB::table("urls")->where("id", $urlMovie->id)->delete();
            }
        }
    
        // Xóa thumbnail nếu có
        if (file_exists(public_path($movie->thumbnail))) {
            unlink(public_path($movie->thumbnail));
        }
    
        // Xóa các episode liên quan đến movie
        $episodes = DB::table("episodes")->where("id_movie", $id_remove)->get();
        foreach ($episodes as $episode) {
            // Xóa các URL của episode
            $urlsEpisode = DB::table("urls")->where("media_id", $episode->id)->where("type", "episode")->get();
            foreach ($urlsEpisode as $urlEpisode) {
                if ($urlEpisode) {
                    $episodePath = parse_url($urlEpisode->url, PHP_URL_PATH);
                    Storage::disk('s3')->delete($episodePath);
                    DB::table("urls")->where("id", $urlEpisode->id)->delete();
                }
            }
    
            // Xóa episode
            DB::table("episodes")->where("id", $episode->id)->delete();
        }
    
        // Xóa movie
        DB::table("movies")->where("id", $id_remove)->delete();
    
        return response()->json([
            "success" => true
        ]);
    }
    
    public function admin__user__remove($id_remove){
        DB::table("users")->where("id",$id_remove)->delete();
        return response()->json([
            "success" => true
        ]);
    }
    public function admin__comment__remove($id_remove){
        Subscription_plans::where("id",$id_remove)->delete();
        return response()->json([
            "success" => true
        ]);
    }
    public function admin__subscription_plan__remove($id_remove){
        DB::table("subscription_plans")->where("id",$id_remove)->delete();
        return response()->json([
            "success" => true
        ]);
    }
    public function admin__notification__remove($id_remove){
        $notificationToDelete = Notifications::find($id_remove);

        if ($notificationToDelete) {       
            $content = $notificationToDelete->content;
    
            DB::table('notifications')->where('content', $content)->delete();
            return response()->json([
                "success" => true,
            ]);
        }
    }
    public function admin__slide__remove($id_remove){
        $slide = DB::table("slides")->where("id",$id_remove);
        unlink(public_path($slide->value('image')));
        $slide->delete();
        return response()->json([
            "success" => true
        ]);
    }
}
