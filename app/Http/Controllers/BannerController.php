<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\Models\Banner; 
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = DB::table("banners")->get()->toArray(); 
        $bannersCount = DB::table("banners")->count(); 

        return view("banners/index", compact("banners", "bannersCount"));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("banners/create"); 
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
            'Banner_title' => 'required',
            'Banner_Image_Path' => 'required'
        ]);

        $data=$request->all();
        if($request->hasfile('Banner_Image_Path'))
        {
            $name1 = $request->Banner_title.'-banner-'.''.uniqid().'.'.$request->Banner_Image_Path->extension();
            $request->Banner_Image_Path->storeAs('files',$name1,'public');
            $data['Banner_Image_Path']=$name1;
            Banner::Create($data);
            return redirect("banners"); 
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
        $banner = Banner::find($id); 
        Storage::delete('/public/files/'.$banner->Banner_Image_Path);
        $banner->delete(); 

        return redirect("banners"); 
    }
}
