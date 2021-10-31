<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $floor = DB::table('floor')
            ->join('roomcategory','floor.floor_cat_id','roomcategory.id')
            ->select('roomcategory.name','floor.*')
            ->orderBy('floor.id','DESC')
            ->get();
        return response()->json($floor);
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
            'floor_number' => 'required',
            'floor_cat_id' => 'required',
        ]);

        $data = array();
        $data['floor_number'] = $request->floor_number;
        $data['floor_cat_id'] = $request->floor_cat_id;
        $save = DB::table('floor')->insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $floor = DB::table('floor')->where('id',$id)->first();
        return response()->json($floor);
        
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
            'floor_number' => 'required',
            'floor_cat_id' => 'required',
        ]);

        $data = array();
        $data['floor_number'] = $request->floor_number;
        $data['floor_cat_id'] = $request->floor_cat_id;
       
        $done=DB::table('floor')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('floor')->where('id',$id)->delete();
    }
}
