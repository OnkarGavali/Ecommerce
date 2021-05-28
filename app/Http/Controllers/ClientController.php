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
        return view("clients/create"); 
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
            'gst_no' => 'required|unique:users,gst_no',
            'shop_address'=> 'required',
            'shop_pincode'=> 'required'
        ]); 
            

        $input = $request->all();
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 9; $i++) {
            $randstring = $characters[rand(0, strlen($characters))];
        }
        
        $input['password'] = Hash::make($randstring);
        $user = User::create($input);        
        
       
        $mail=$request->email;
        $password=$randstring;
        $this->dispatch(new ActivateAccountjob($mail,$password));

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
        $ClientDetails = User::find($id); 
        // return $ClientDetails; 
        return view("clients/show", compact('ClientDetails')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ClientDetails = User::find($id); 
        // return $ClientDetails; 
        return view("clients/edit", compact('ClientDetails')); 
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
        request()->validate([
            'name' => 'required',
            'shop_name' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required',
            'gst_no' => 'required',
            'shop_address'=> 'required',
            'shop_pincode'=> 'required'
        ]);

        $client = User::find($id); 
    
        $client->update($request->all());
    
        return redirect()->route('clients.index')
                        ->with('success','Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("users")->where('id',$id)->delete();
        return redirect()->route('clients.index')
                        ->with('success','Client deleted successfully');
    }
}
