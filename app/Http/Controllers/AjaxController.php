<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Comments;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\Reply_comments;
use App\Models\Comment_Filters;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function check__payment(){
        if(auth()->check()){
            $subscription = Subscription::with('subscription_plan')->where("payment_status", 1)->where("id_user", auth()->id())->first();
            if($subscription){
                if(strtotime($subscription->end_date) < time()){
                    DB::table("subscriptions")
                    ->where("id", $subscription->id)
                    ->update([
                        'payment_status' => 0
                    ]);
                    DB::table("users")->where("id",auth()->id())->update([
                        "premium" => 0
                    ]);

                    DB::table('notifications')->insert([
                        'id_receive_user' => auth()->user()->id,
                        'content' => "{$subscription->subscription_plan->name} của bạn đã hết hạn, chúng tôi đã ngưng các đặc quyền của bạn!"
                    ]);

                    return response()->json([
                        "success" => true
                    ]);
                }
            }
        }
        return response()->json([
            "success" => false
        ]);
    }

    public function nav(){
        $isLogin = auth()->check();

        $categories = DB::table("categories")->get();

        if(!$isLogin){
            return response()->json([
                "success" => true,
                "categories" => $categories,
                "isLogin" => $isLogin
            ]);
        }

        $query = Notifications::with("send_user")->where("id_receive_user",auth()->id())->where("isDeleted",0)->orderBy("created_at","desc");
        $notifications = $query->get();
        $isCheck = $query->where("status",0)->exists();

        return response()->json([
            "success" => true,
            "categories" => $categories,
            "isCheck" =>  $isCheck,
            "isLogin" => $isLogin,
            "notifications" => $notifications
        ]);
    }

    public function search($value){
        $movies = Movies::where("title", "like", "%{$value}%")
        ->where('status',1)
        ->where('isDeleted',0)
        ->limit(4)
        ->get();
        
        return response()->json([
            "success" => true,
            "movies" => $movies
        ]);
    }

    public function notification__update__status(){
        Notifications::where("status",0)
        ->where("id_receive_user",auth()->id())
        ->where("isDeleted",0)
        ->update([
            "status" => 1
        ]);

    }

    public function movie($id){
        $views = DB::table("movies")->where("id",$id)->value("views");
        $likes = DB::table("likes")->where("id_movie",$id)->count();

        return response()->json([
            "success" => true,
            "views" => $views,
            "likes" => $likes
        ]);
    }

    public function comments_count($id){
        $comments_count = Comments::where("id_movie",$id)->count();
        return response()->json([
            "success" => true,
            "comments_count" => $comments_count,
        ]);
    }
    public function lazy__load__comments(Request $request, $id){
        // Lấy số trang và số lượng bình luận mỗi trang từ request
        $perPage = $request->input('per_page', 5);  // Số lượng bình luận mỗi trang, mặc định là 5
        $page = $request->input('page', 2); 

        // Lấy bình luận theo phân trang
        $comments = Comments::with("user")
            ->with("reply_comments")
            ->where("id_movie", $id)
            ->where("status",1)
            ->orderBy("created_at", "desc")
            ->paginate($perPage, ['*'], 'page', $page);

        $forbiddenWords = Comment_Filters::pluck('content')->toArray();

        $comments->getCollection()->transform(function ($comment) use ($forbiddenWords) {
            foreach ($forbiddenWords as $word) {
                $pattern = '/\b' . preg_quote($word, '/') . '\b/i';
                $replacement = str_repeat('*', mb_strlen($word));
                $comment->content = preg_replace($pattern, $replacement, $comment->content);
            }
            return $comment;
        });
        
        // Lấy thông tin người dùng
        $user_id = auth()->check() ? auth()->id() : null;
        $user_login = auth()->check();
        
        return response()->json([
            "success" => true,
            "comments" => $comments,
            "user_login" => $user_login,
            "user_id" => $user_id
        ]);
    }
    
    public function show__reply($id){
        $reply_comments = Reply_comments::with("user","user_reply")
        ->where("id_comment",$id)
        ->where("status",1)
        ->get();

        $forbiddenWords = Comment_Filters::pluck('content')->toArray();

        $reply_comments->transform(function ($reply) use ($forbiddenWords) {
            foreach ($forbiddenWords as $word) {
                $pattern = '/\b' . preg_quote($word, '/') . '\b/i';
                $replacement = str_repeat('*', mb_strlen($word));
                $reply->content = preg_replace($pattern, $replacement, $reply->content);
            }
            return $reply;
        });
    
        $user_id = auth()->check() ? auth()->id() : null;
        $user_login = auth()->check();

        return response()->json([
            "success" => true,
            "reply_comments" => $reply_comments,
            "user_login" => $user_login,
            "user_id" => $user_id
        ]);
    }

    public function show__pay__history($id){
        $payments = DB::table("payments")->where('id_sub',$id)->get();
        $user = auth()->user();
        return response()->json([
            "success" => true,
            "payments" => $payments,
            "user" => $user
        ]);
    }
}
