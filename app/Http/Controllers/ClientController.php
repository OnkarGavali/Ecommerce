<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Jobs\ActivateAccountjob; 

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::doesntHave('roles')->get();
        // return $clients;
        return view("clients/index", compact("clients")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("AdminCreateUser"); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'shop_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_no' => 'required',
            'gst_no' => 'required',
            'shop_address'=> 'required',
            'shop_pincode'=> 'required'
        ]); 
            

        $input = $request->all();
        $input['password'] = Hash::make('123456');
        $user = User::create($input);        
        
        $msg="Congratulations! You have been registered successfully on E-Commerce App!! CLick on activate the account click on Forgot Your Password button on Website";
        $mail=$request->email;
        $this->dispatch(new ActivateAccountjob($mail));

        return back()->with('success','Registered successfully');
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
