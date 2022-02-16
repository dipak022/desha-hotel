<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class CartController extends Controller
{
    public function AddtoCart(Request $request,$id){
        
       
        $product = DB::table('hallservice')->where('id',$id)->first();
        //$product_name = $data->product_name;
        $check = DB::table('pos')->where('ser_id',$id)->first();

        if($check){
            DB::table('pos')->where('ser_id',$id)->increment('ser_quentity');
            $product = DB::table('pos')->where('ser_id',$id)->first();
            $subtotal =$product->ser_quentity *$product-> ser_price;
            DB::table('pos')->where('ser_id',$id)->update(['ser_total'=>$subtotal]);
            return response()->json("done");
            
        }else{
            $data = array();
            $data['ser_id'] = $id;
            $data['ser_name'] = $product->services_name;
            $data['ser_quentity'] = 1;
            $data['ser_price'] = $product->selling_price;
            $data['ser_total'] = $product->selling_price;
            DB::table('pos')->insert($data);
            return response()->json("done");

        } 

    }
    public function cardservice(){
        $cart =DB::table('pos')->get();
        return response()->json($cart);
    }

    public function getvat(){
        $done= DB::table('setting')->first();
        return response()->json($done);
     }

     public function getService($id)
    {
        $product = DB::table('hallservice')->where('category_id',$id)->get();
        return response()->json($product);
    }

    public function removeCart($id){
        DB::table('pos')->where('id',$id)->delete();

    }

    public function Increment($id){

        $quentity =DB::table('pos')->where('id',$id)->increment('ser_quentity');
        $product = DB::table('pos')->where('id',$id)->first();

        $subtotal =$product->ser_quentity *$product-> ser_price;

        DB::table('pos')->where('id',$id)->update(['ser_total'=>$subtotal]);
        return response()->json("done");


    }
    public function Decrement($id){
        $quentity =DB::table('pos')->where('id',$id)->decrement('ser_quentity');
        $product = DB::table('pos')->where('id',$id)->first();

        $subtotal =$product->ser_quentity *$product->ser_price;

        DB::table('pos')->where('id',$id)->update(['ser_total'=>$subtotal]);
        return response()->json("done");
        
    }
}
