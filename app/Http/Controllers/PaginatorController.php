<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movies;
use App\Models\Slides;
use App\Models\Comments;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class PaginatorController extends Controller
{
    public function amount($type_paginator){
        if($type_paginator == "category"){
            $type_paginator = "categorie";
        }

        if($type_paginator == "employee_user"){
            $paginator = DB::table("users")
                ->select("id")
                ->where('isDeleted', 0)
                ->where('role', "user")
                ->paginate(8);

            $amount = $paginator->total();
        
            $current = request()->input('page',1);

            $number = $paginator->lastPage();

            return response()->json([
                "number" => $number,
                "current" => $current,
                "amount" => $amount,
                "success" => true
            ]);
        }

        $table = "{$type_paginator}s"; // Xây dựng tên bảng

        if (Schema::hasColumn($table, 'isDeleted')) {
            $paginator = DB::table($table)
                ->select("id")
                ->where('isDeleted', 0)
                ->paginate(8);
        } else {
            $paginator = DB::table($table)
                ->select("id")
                ->paginate(8);
        }

        $amount = $paginator->total();
        
        $current = request()->input('page',1);

        $number = $paginator->lastPage();

        return response()->json([
            "number" => $number,
            "current" => $current,
            "amount" => $amount,
            "success" => true
        ]);
    }
}
