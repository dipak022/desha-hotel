<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company=DB::table('company')->get();
        return response()->json($company);
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
            'company_name' => 'required',
            'company_address' => 'required',
            'company_website' => 'required',
            'company_contact_number' => 'required',
            'company_email' => 'required',
            'company_contact_personal_name' => 'required',
            'company_contact_personal_ph_no' => 'required',
            'company_contact_personal_email' => 'required',
            'company_contact_personal_nid' => 'required',
        ]);

        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['company_website'] = $request->company_website;
        $data['company_contact_number'] = $request->company_contact_number;
        $data['company_email'] = $request->company_email;
        $data['company_contact_personal_name'] = $request->company_contact_personal_name;
        $data['company_contact_personal_ph_no'] = $request->company_contact_personal_ph_no;
        $data['company_contact_personal_email'] = $request->company_contact_personal_email;
        $data['company_contact_personal_nid'] = $request->company_contact_personal_nid;
        $save = DB::table('company')->insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = DB::table('company')->where('id',$id)->first();
        return response()->json($company);
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
            'company_name' => 'required',
            'company_address' => 'required',
            'company_website' => 'required',
            'company_contact_number' => 'required',
            'company_email' => 'required',
            'company_contact_personal_name' => 'required',
            'company_contact_personal_ph_no' => 'required',
            'company_contact_personal_email' => 'required',
            'company_contact_personal_nid' => 'required',
        ]);

        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['company_website'] = $request->company_website;
        $data['company_contact_number'] = $request->company_contact_number;
        $data['company_email'] = $request->company_email;
        $data['company_contact_personal_name'] = $request->company_contact_personal_name;
        $data['company_contact_personal_ph_no'] = $request->company_contact_personal_ph_no;
        $data['company_contact_personal_email'] = $request->company_contact_personal_email;
        $data['company_contact_personal_nid'] = $request->company_contact_personal_nid;
        $done=DB::table('company')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('company')->where('id',$id)->delete();
    }
}
