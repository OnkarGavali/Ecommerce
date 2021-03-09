<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::latest()->paginate(5);
        return view('owners.index',compact('owners'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'Owner_name' => 'required',
            'Owner_shop_name' => 'required',
            'Owner_gst_no' => 'required',
            'Owner_mobile_no' => 'required',
            'Owner_email' => 'required',
        ]);
    
        Owner::create($request->all());
    

        return redirect()->route('owners.index')
                        ->with('success','Owner created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('owners.show',compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owners.edit',compact('owner'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
         request()->validate([
            'Owner_name' => 'required',
            'Owner_shop_name' => 'required',
            'Owner_gst_no' => 'required',
            'Owner_mobile_no' => 'required',
            'Owner_email' => 'required',
        ]);
    
        $owner->update($request->all());
    
        return redirect()->route('owners.index')
                        ->with('success','Owner updated successfully');
    }


}
