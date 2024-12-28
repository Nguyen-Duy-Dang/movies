<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReplyCommentController extends Controller
{
    public function reply__comment__add($id_movie){
        $id = DB::table("reply_comments")->insertGetId([
            "id_movie" => $id_movie,
            "id_user" => auth()->user()->id,
            "id_user_reply" => request('id__user__reply'),
            "id_comment" => request('id__comment'),
            "content" => request("comment__content"),
            "status" => 1
        ]);
        
        $comment = DB::table("comments")->where("id", request('id__comment'))->first();
        $reply_comment = DB::table("reply_comments")->where("id", $id)->first();
        $user = DB::table("users")->where("id", auth()->user()->id)->first();
        $name_user = DB::table("users")->where("id", request('id__user__reply'))->value("name");

        if(request('id__user__reply') != auth()->id()){
            $id_user = auth()->user();
            DB::table('notifications')->insert([
                'id_receive_user' => request('id__user__reply'),
                'id_movie' => $id_movie,
                'content' => "{$id_user->name} đã trả lời bình luận của bạn"
            ]);
        }

        return response()->json([
            "success" => true,
            "comment" => $comment,
            "reply_comment" => $reply_comment,
            "name_user" => $name_user,
            "user" => $user
        ]);
    }
    public function remove_by_id($id){
        DB::table("reply_comments")->where('id',$id)->delete();
        return response()->json([
            "success" => true
        ]);
    }
    public function admin__status__update($id){
        $show = false;
        $status = DB::table("reply_comments")->where("id", $id)->value("status");
        
        if ($status == 0) {
            DB::table("reply_comments")->where("id", $id)->update([
                "status" => 1
            ]);
            $show = true;
        } else {
            DB::table("reply_comments")->where("id", $id)->update([
                "status" => 0
            ]);
        }
        return response()->json([
            "show" => $show,
            "success" => true
        ]);
    }
    public function admin__delete($id){
        DB::table("reply_comments")->where("id",$id)->delete();
        return response()->json([
            "success" => true
        ]);
    }
}
