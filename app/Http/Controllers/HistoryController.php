<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function remove_by_id($id){
        DB::table("histories")->where("id",$id)->delete();
        return response()->json([
            "success" => true
        ]);
    }
}
