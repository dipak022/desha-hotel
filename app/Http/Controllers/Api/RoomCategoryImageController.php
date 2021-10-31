<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class RoomCategoryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomcategoryimage = DB::table('roomcategoryimage')
            ->join('roomcategory','roomcategoryimage.room_category_id','roomcategory.id')
            ->select('roomcategory.name','roomcategoryimage.*')
            ->orderBy('roomcategoryimage.id','DESC')
            ->get();
            return response()->json($roomcategoryimage);  
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
            'room_category_id' => 'required',
            
            
        ]);

        $data = array();
        $data['room_category_id'] = $request->room_category_id;

        if($request->room_category_image){

            $image = $request->room_category_image;
            $position = strpos($image,';');
            $sub = substr($image, 0 , $position);
            $ext = explode('/',$sub)[1];
            //return $ext;
            $name = time().".".$ext;
            $patho = Image::make($image)->resize(240,200);
            $upload_path = "backend/room_category_image/";
            $image_url = $upload_path.$name;
            $patho->save($image_url);
            
            
            $data['room_category_image'] = $image_url;
            $save = DB::table('roomcategoryimage')->insert($data);



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
        DB::table('roomcategoryimage')->where('id',$id)->delete();
    }
}
