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

    public function Getauditorium()
    {
        $auditorium = DB::table("room")
            ->where("floor",0)
            //->where("room_status",0)
            ->get();
        return response()->json($auditorium);
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
            ->where('id',$id)
            ->first();

            if($Specificroom->room_status==1){
                $reservation = DB::table('reservation')
                    ->join('customer','reservation.customers_id','customer.id')
                    ->join('room','reservation.rooms_id','room.id')
                    ->join('roomCategory','reservation.room_categ_id','roomCategory.id')
                    ->where('room.id',$id)
                    ->select('customer.full_name','customer.phone','customer.address','room.number','roomCategory.name','reservation.*')
                    ->orderBy('reservation.id','DESC')
                    ->get();
                    return response()->json($reservation);

            }else{
                $Specificroom = DB::table('room')
                    ->join('roomcategory','room.room_cat_id','roomcategory.id')
                    ->where('room.id',$id)
                    ->select('roomcategory.name','room.*')
                    ->get();

            }

            


        

            
        return response()->json($Specificroom);
    }

    
    public function GetservicesName()
    {
        $services=DB::table('service')->get();
        return response()->json($services);
    }
    
    public function Getselectedservicesprice()
    {
        $price_id = request('price_id');
        $price=DB::table('service')->where('id',$price_id)->get();
        return response()->json($price);
    }


    public function reservationcustomers(){
        $reservation = DB::table('reservation')
        ->join('customer','reservation.customers_id','customer.id')
        ->join('room','reservation.rooms_id','room.id')
        ->join('roomCategory','reservation.room_categ_id','roomCategory.id')
        ->select('customer.full_name','customer.phone','customer.address','room.number','roomCategory.name','reservation.*')
        ->orderBy('reservation.id','DESC')
        ->get();
        return response()->json($reservation);
    }

    public function reservationClear(Request $request){
        $roomNumbe=$request->checkoutroomnumber;
        //return response()->json($roomNumbe);
        DB::table('room')->where('id',$roomNumbe)->update(['room_status'=> 0]);

    }
}
