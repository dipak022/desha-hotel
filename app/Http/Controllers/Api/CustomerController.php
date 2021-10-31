<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = DB::table('customer')
            ->join('customertype','customer.customer_type','customertype.id')
            ->select('customertype.cus_type','customer.*')
            ->orderBy('customer.id','DESC')
            ->get();
            return response()->json($customer); 
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
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required | unique:customer',
            'address' => 'required',
            'nid' => 'required',
            'customer_type' => 'required',
            
           
        ]);

        

        if($request->patho){

            $image = $request->patho;
            $position = strpos($image,';');
            $sub = substr($image, 0 , $position);
            $ext = explode('/',$sub)[1];
            //return $ext;
            $name = time().".".$ext;
            $patho = Image::make($image)->resize(240,200);
            $upload_path = "backend/customer/";
            $image_url = $upload_path.$name;
            $patho->save($image_url);


            $data = array();
            $data['customer_type'] = $request->customer_type;
            $data['full_name'] = $request->full_name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['address'] = $request->address;
            $data['nid'] = $request->nid;
            $data['patho'] = $image_url;
            
            $save = DB::table('customer')->insert($data);



        }else{

            $data = array();
            $data['customer_type'] = $request->customer_type;
            $data['full_name'] = $request->full_name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['address'] = $request->address;
            $data['nid'] = $request->nid;
            $data['patho'] = $image_url;
            
            $save = DB::table('customer')->insert($data);
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
        $customer = DB::table('customer')->where('id',$id)->first();
        return response()->json($customer);
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
        $data=array();   
         $data['customer_type'] = $request->customer_type;
         $data['full_name']=$request->full_name;
         $data['email']=$request->email;
         $data['phone']=$request->phone;
         $data['address']=$request->address;
         $data['nid']=$request->nid;
         $image = $request->newpatho;
         if($image){
            
            $position = strpos($image,';');
            $sub = substr($image, 0 , $position);
            $ext = explode('/',$sub)[1];
            //return $ext;
            $name = time().".".$ext;
            $patho = Image::make($image)->resize(240,200);
            $upload_path = "backend/customer/";
            $image_url = $upload_path.$name;
            $success= $patho->save($image_url);
            if($success){
                $data['patho']=$image_url;
                $employee = DB::table('customer')->where('id',$id)->first();
                $image_path = $employee->patho;
                unlink($image_path);
                $done=DB::table('customer')->where('id',$id)->update($data);

            }
         }else{
            $old_patho = $request->patho;
            $data['patho']=$old_patho;
            $done=DB::table('customer')->where('id',$id)->update($data);

         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = DB::table('customer')->where('id',$id)->first();
        $patho = $customers->patho;
        if($patho){
            unlink($patho);
            DB::table('customer')->where('id',$id)->delete();
        }
        else{
            DB::table('customer')->where('id',$id)->delete();
        }
    }
}
