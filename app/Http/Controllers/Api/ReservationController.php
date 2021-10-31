<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = DB::table('reservation')
        ->join('customer','reservation.customers_id','customer.id')
        ->join('room','reservation.rooms_id','room.id')
        ->join('roomCategory','reservation.room_categ_id','roomCategory.id')
        ->select('customer.full_name','customer.phone','customer.address','room.number','roomCategory.name','reservation.*')
        ->orderBy('reservation.id','DESC')
        ->get();
        return response()->json($reservation);
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

        $bookingIndate=$request->check_in_date;
        $roomNumbe=$request->room_cag_id;
        $bookingOutdate=$request->check_out_date;

        

       /*
        $check = DB::table('reservation')
            ->join('room','reservation.room_categ_id','room.id')
            ->where('reservation.check_in_date',$bookingIndate)
            ->where('reservation.room_categ_id',$roomNumbe)
            ->select('room.number','reservation.*')
            ->first();

       
       
        $check = DB::table('reservation')
            ->where('check_in_date',$bookingIndate)
            ->where('room_categ_id',$roomNumbe)
            ->first();
        
        if($check){
            //$porerday=$check->check_out_date;
            $chato=DB::table('reservation')
            ->where('check_in_date', '<' ,$bookingIndate)
            ->first();
            $try = $chato->check_out_date;
            if($try>$bookingIndate){
                return "Divo nah";
            }
            else{
                return "Dibo";
            }
            //return response()->json($chato);
            
            

        }else{

        }
         */   

        $data = array();

        $validated = $request->validate([
            
            'check_in_date' => 'required',
            'check_in_time' => 'required',
            'check_out_date' => 'required',
            'check_out_time' => 'required',
            'number_of_adult' => 'required',
            'customerid' => 'required',
            'selectedClass' => 'required',
            'room_cag_id' => 'required',
            'room_floor_id' => 'required',
            'room_prices' => 'required',
            'pay_amount' => 'required',
            'due_amount' => 'required',
        ]);
        
        $data['check_in_date'] = $request->check_in_date;
        $data['check_in_time'] = $request->check_in_time;
        $data['check_out_date'] = $request->check_out_date;
        $data['check_out_time'] = $request->check_out_time;
        $data['number_of_adult'] = $request->number_of_adult;
        $data['customers_id'] = $request->customerid;
        $data['room_categ_id'] = $request->selectedClass;
        $data['rooms_id'] = $request->room_cag_id;
        $data['room_floor'] = $request->room_floor_id;
        $data['room_price'] = $request->room_prices;
        $data['pay_amount'] = $request->pay_amount;
        $data['due_amount'] = $request->due_amount;
        $data['status'] = 0;
        
        $save = DB::table('reservation')->insert($data);

        DB::table('room')->where('id',$roomNumbe)->update(['room_status'=> 1]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = DB::table('reservation')->where('id',$id)->first();
        return response()->json($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('reservation')->where('id',$id)->delete();
    }
}
