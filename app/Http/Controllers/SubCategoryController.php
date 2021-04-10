<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::latest()->paginate(5);
        return view('subcategories.index',compact('subcategories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create',compact('categories'));
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
            'Subcategory_name' => 'required',
            'Subcategory_description' => 'required',
            'Subcategory_category_id' => 'required',
            'Subcategory_image_url' => 'required',
        ]);

        if($request->hasfile('Subcategory_image_url'))
        {
            $name = $request->Subcategory_name.'-'.uniqid().'-'.'.'.$request->Subcategory_image_url->extension();
            $request->Subcategory_image_url->storeAs('files',$name,'public');        
        }
      
        $varSubcategory = new SubCategory([
            'Subcategory_name' => $request->Subcategory_name,
            'Subcategory_category_id' => $request->Subcategory_category_id,
            'Subcategory_description' => $request->Subcategory_description,
            'Subcategory_image_url' =>  $name,
        ]);
        $varSubcategory->save();
    
        return redirect()->route('subcategories.index')
                        ->with('success','SubCategory created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        
        return view('subcategories.show',compact('subcategory'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategories.edit',compact('subcategory','categories'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        request()->validate([
            'Subcategory_name' => 'required',
            'Subcategory_description' => 'required',
            'Subcategory_category_id' => 'required',
        ]);
        
        if($request->Subcategory_image_url)
        {
            $extension = $request->Subcategory_image_url->getClientOriginalExtension();
            $name = $request->Subcategory_name.'-'.uniqid().'-'.'.'.$extension;
            if($subcategory->Subcategory_image_url)
            {
                    Storage::delete('/public/files/'.$subcategory->Subcategory_image_url);
            }
            $request->Subcategory_image_url->storeAs('files',$name,'public');
        }
        else
        {
            $name = $subcategory->Subcategory_image_url;
        }
        $data=$request->all();
        $data['Subcategory_image_url']=$name;
        $subcategory->update($data);

        return redirect()->route('subcategories.index')
                        ->with('success','SubCategory updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        //$subcategory->delete();
        if( $subcategory['Subcategory_status']=='0')
        {
            $subcategory['Subcategory_status']='1';
            $subcategory->update();
            return redirect()->route('subcategories.index')
                        ->with('success','SubCategory is Active now');
        }
        else
        {
            $subcategory['Subcategory_status']='0';
            $subcategory->update();
            return redirect()->route('subcategories.index')
                        ->with('success','SubCategory is Inactive now');
        }
        
    }
}
