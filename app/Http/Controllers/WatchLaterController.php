<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WatchLaterController extends Controller
{
    public function watch_later($id){
        $check = DB::table("watch_laters")->where("id_movie", $id)->where("id_user",auth()->user()->id)->count();
        if($check > 0){
            DB::table("watch_laters")->where("id_movie",$id)->where("id_user",auth()->user()->id)->delete();
        }else{
            DB::table("watch_laters")->where("id_movie",$id)->insert([
                "id_user" => auth()->user()->id,
                "id_movie" => $id
            ]);
        }
        return response()->json([
            "check" => $check,
            "success" => true
        ]);
    }

    public function remove_by_id($id){
        DB::table("watch_laters")->where("id", $id)->delete();
    
        return response()->json([
            "success" => true
        ]);
    }
}
