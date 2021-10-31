<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class RoomController extends Controller
{


     

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $room = DB::table('room')
            ->join('roomcategory','room.room_cat_id','roomcategory.id')
            ->select('roomcategory.name','room.*')
            ->orderBy('room.id','DESC')
            ->get();

            /*
             $room = DB::table('room')
            ->join('floor','room.floor_id','floor.id')
            ->join('roomcategory','room.room_cat_id','roomcategory.id')
            ->select('floor.floor_name','roomcategory.name','room.*')
            ->orderBy('room.id','DESC')
            ->get();
            */
            
        return response()->json($room);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'room_cat_id' => 'required',
            'description' => 'required',
            'available_date' => 'required',
            'number' => 'required',
            'room_price' => 'required',
            'floor' => 'required',
            
        ]);

        $data = array();
        
        $data['room_cat_id'] = $request->room_cat_id;
        $data['description'] = $request->description;
        $data['available_date'] = $request->available_date;
        $data['number'] = $request->number;
        $data['room_price'] = $request->room_price;
        $data['floor'] = $request->floor;
        $data['room_status'] = 0;
        
        $save = DB::table('room')->insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomcategory = DB::table('room')->where('id',$id)->first();
        return response()->json($roomcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            
            'room_cat_id' => 'required',
            'description' => 'required',
            'available_date' => 'required',
            'number' => 'required',
            'room_price' => 'required',
            'floor' => 'required',
            
        ]);

        $data = array();
        
        $data['room_cat_id'] = $request->room_cat_id;
        $data['description'] = $request->description;
        $data['available_date'] = $request->available_date;
        $data['number'] = $request->number;
        $data['room_price'] = $request->room_price;
        $data['floor'] = $request->floor;
        $data['room_status'] = 0;
        

        $done=DB::table('room')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('room')->where('id',$id)->delete();
    }
}
