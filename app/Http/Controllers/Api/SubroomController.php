<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SubroomController extends Controller
{
  

    public function GetRoomCategory()
    {
        $roomcategory=DB::table('roomcategory')->get();
        return response()->json($roomcategory);
    }
    //subcategory collect by ajax request
    public function GetSubcat()
    {
        $room_id = request('room_id');
        $room = DB::table("room")
        ->where("room_cat_id",$room_id)
        ->where("room_status",0)
        ->get();
        return response()->json($room);
    }

    public function Getfloor()
    {
        $floor_id = request('floor_id');
        $floor = DB::table('room')->where('id',$floor_id)->get();
        return response()->json($floor);
    }

    public function GetPrice()
    {
        $price_id = request('price_id');
        $roomcategory=DB::table('room')->where('id',$price_id)->get();
        return response()->json($roomcategory);
    }

    public function GetRoomsOne()
    {
        $room = DB::table("room")
            ->where("floor",1)
            //->where("room_status",0)
            ->get();
        return response()->json($room);
    }

    public function GetRoomsTwo()
    {
        $room = DB::table("room")
            ->where("floor",2)
            //->where("room_status",0)
            ->get();
        return response()->json($room);
    }

    public function GetRoomsThree()
    {
        $room = DB::table("room")
            ->where("floor",3)
            //->where("room_status",0)
            ->get();
        return response()->json($room);
    }

    public function GetRoomsFour()
    {
        $room = DB::table("room")
            ->where("floor",4)
            //->where("room_status",0)
            ->get();
        return response()->json($room);
    }

    public function GetRoomsFive()
    {
        $room = DB::table("room")
            ->where("floor",5)
            //->where("room_status",0)
            ->get();
        return response()->json($room);
    }

    
    public function ModelFaceRoomInfo($id)
    {
        //$Specificroom =DB::table('room')->where('id',$id)->first();
        

        $Specificroom = DB::table('room')
            ->join('roomcategory','room.room_cat_id','roomcategory.id')
            ->where('room.id',$id)
            ->select('roomcategory.name','room.*')
            ->get();
        return response()->json($Specificroom);
    }
}
