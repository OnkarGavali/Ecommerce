<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

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
                $name = $request->Subcategory_name.time().'.'.$request->Subcategory_image_url->extension();
                $request->Subcategory_image_url->move(public_path().'/files/', $name);
                
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
        return view('subcategories.edit',compact('subcategory'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
         request()->validate([
            'Subcategory_name' => 'required',
            'Subcategory_description' => 'required',
            'Subcategory_category_id' => 'required',
            'Subcategory_image_url' => 'required',
        ]);
    
        $subcategory->update($request->all());
    
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
        $subcategory->delete();
    
        return redirect()->route('subcategories.index')
                        ->with('success','SubCategory deleted successfully');
    }
}
