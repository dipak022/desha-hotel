<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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

        $datas = array();
        
        $find = DB::table('reservation')->where('customers_id',$request->servicecustomerid)->first();
        $id = $find->id;
        $old_price = $find->room_price;
        $new_price = $old_price + $request->service_total;
        $datas['room_price'] = $new_price;
        $done=DB::table('reservation')->where('id',$id)->update($datas);
        $data = array();

        $validated = $request->validate([
            
            'servicecustomerid' => 'required',
            'selectedServicesPrice' => 'required',
            'service_unit' => 'required',
            'get_service_price' => 'required',
            'service_total' => 'required',
            
        ]);

      

        $data['service_customer_name'] = $request->servicecustomerid;
        $data['service_provider_name'] = $request->selectedServicesPrice;
        $data['service_provider_unit'] = $request->service_unit;
        $data['service_provider_price'] = $request->get_service_price;
        $data['service_provider_total'] = $request->service_total;
     
        
        
        $save = DB::table('serviceprovide')->insert($data);
        //return response()->json($data);
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
        //
    }
}
