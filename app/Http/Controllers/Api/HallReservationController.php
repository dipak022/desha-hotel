<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HallReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hallreservation = DB::table('hallreservation')
            ->join('halltype','hallreservation.hall_id','halltype.id')
            ->join('customertype','hallreservation.customer_id','customertype.id')
            ->select('halltype.hall_name','customertype.name','hallreservation.*')
            ->orderBy('hallreservation.id','DESC')
            ->get();
            
        return response()->json($hallreservation);
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
            'customer_id' => 'required',
            'hall_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'session_day_hour_quantity' => 'required',
            'total_amount' => 'required',
            'total_guest' => 'required',
            
        ]);

        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['hall_id'] = $request->hall_id;
        $data['check_in'] = $request->check_in;
        $data['check_out'] = $request->check_out;
        $data['session_day_hour_quantity'] = $request->session_day_hour_quantity;
        $data['status'] = 0;
        $data['total_amount'] = $request->total_amount;
        $data['total_guest'] = $request->total_guest;
        
        $save = DB::table('hallreservation')->insert($data);
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
