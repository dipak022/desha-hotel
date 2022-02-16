<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class HallDetailsController extends Controller
{
    public function gethalltypes(){
        $hall_id = request('hall_id');
        $hall = DB::table("halltype")
        ->where("id",$hall_id)
        ->get();
        return response()->json($hall);
    }

    public function find_hallreservation(){
        
        $hall = DB::table("hallreservation")
        ->where("status",1)
        ->get();
        return response()->json($hall);
    }
}
