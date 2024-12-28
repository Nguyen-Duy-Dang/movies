<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function like($id){
        $check = DB::table("likes")->where("id_movie", $id)->where("id_user",auth()->user()->id)->count();
        if($check > 0){
            DB::table("likes")->where("id_movie",$id)->where("id_user",auth()->user()->id)->delete();
        }else{
            DB::table("likes")->where("id_movie",$id)->insert([
                "id_user" => auth()->user()->id,
                "id_movie" => $id
            ]);
        }
        $likes = DB::table("likes")->where("id_movie", $id)->count();
        return response()->json([
            "check" => $check,
            "likes" => $likes,
            "success" => true
        ]);
    }

    public function remove_by_id($id){
        DB::table("likes")->where("id",$id)->delete();
        return response()->json([
            "success" => true
        ]);
    }
    
}
