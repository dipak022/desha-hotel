<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=DB::table('service')->get();
        return response()->json($service);
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
            'service_name' => 'required',
            'service_unit' => 'required',
            'service_price' => 'required',
            'service_total' => 'required',
            
        ]);
        //$datas = array();
        //$datas['room_price'] = $request->service_price;
        //$done=DB::table('reservation')->where('id',$id)->update($datas);
        $data = array();

        $data['service_name'] = $request->service_name;
        $data['service_unit'] = $request->service_unit;
        $data['service_price'] = $request->service_price;
        $data['service_total'] = $request->service_total;
       
        
        $save = DB::table('service')->insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = DB::table('service')->where('id',$id)->first();
        return response()->json($service);
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
            'service_name' => 'required',
            'service_unit' => 'required',
            'service_price' => 'required',
            'service_total' => 'required',
            
        ]);

        $data = array();
        $data['service_name'] = $request->service_name;
        $data['service_unit'] = $request->service_unit;
        $data['service_price'] = $request->service_price;
        $data['service_total'] = $request->service_total;
        $done=DB::table('service')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('service')->where('id',$id)->delete();
    }
}
