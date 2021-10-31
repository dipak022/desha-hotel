<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class RoomImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomimage = DB::table('roomimage')
            ->join('room','roomimage.room_ids','room.id')
            ->select('room.number','roomimage.*')
            ->orderBy('roomimage.id','DESC')
            ->get();
            return response()->json($roomimage);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'room_ids' => 'required',
            
            
        ]);

        $data = array();
        $data['room_ids'] = $request->room_ids;

        if($request->room_image){

            $image = $request->room_image;
            $position = strpos($image,';');
            $sub = substr($image, 0 , $position);
            $ext = explode('/',$sub)[1];
            //return $ext;
            $name = time().".".$ext;
            $patho = Image::make($image)->resize(240,200);
            $upload_path = "backend/room_image/";
            $image_url = $upload_path.$name;
            $patho->save($image_url);
            
            
            $data['room_image'] = $image_url;
            $save = DB::table('roomimage')->insert($data);



        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('roomimage')->where('id',$id)->delete();
    }
}
