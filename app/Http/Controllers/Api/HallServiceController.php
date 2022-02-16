<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class HallServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $hallservice = DB::table('hallservice')
            ->join('category','hallservice.category_id','category.id')
            ->select('category.category_name','hallservice.*')
            ->orderBy('hallservice.id','ASC')
            ->get();
            return response()->json($hallservice); 
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
            'category_id' => 'required',
            'services_name' => 'required',
            'selling_price' => 'required',
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
            $data['category_id'] = $request->category_id;
            $data['services_name'] = $request->services_name;
            $data['services_code'] = $request->services_code;
            $data['selling_price'] = $request->selling_price;
            $data['status'] = 0; 
            $data['root'] = 0;
            $data['patho'] = $image_url;
            $save = DB::table('hallservice')->insert($data);

        }else{

            $data = array();
            $data['category_id'] = $request->category_id;
            $data['services_name'] = $request->services_name;
            $data['services_code'] = $request->services_code;
            $data['selling_price'] = $request->selling_price;
            $data['status'] = 0; 
            $data['root'] = 0;
            
            $save = DB::table('hallservice')->insert($data);
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
        $hallservice = DB::table('hallservice')->where('id',$id)->first();
        return response()->json($hallservice);
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
            'category_id' => 'required',
            'services_name' => 'required',
            'selling_price' => 'required',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['services_name'] = $request->services_name;
        $data['services_code'] = $request->services_code;
        $data['selling_price'] = $request->selling_price;
        $data['status'] = 0; 
        $data['root'] = 0;
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
                $employee = DB::table('hallservice')->where('id',$id)->first();
                $image_path = $employee->patho;
                if($image_path){
                    unlink($image_path);
                    $done=DB::table('hallservice')->where('id',$id)->update($data);
                }else{
                    $done=DB::table('hallservice')->where('id',$id)->update($data);
                }
            }
         }else{
            $old_patho = $request->patho;
            $data['patho']=$old_patho;
            $done=DB::table('hallservice')->where('id',$id)->update($data);

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
        
        $hallservice = DB::table('hallservice')->where('id',$id)->first();
        $patho = $hallservice->patho;
        if($patho){
            unlink($patho);
            DB::table('hallservice')->where('id',$id)->delete();
        }
        else{
            DB::table('hallservice')->where('id',$id)->delete();
        }
    }
}
