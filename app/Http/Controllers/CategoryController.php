<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
        $categories = Category::latest()->paginate(5);
        return view('categories.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'Category_name' => 'required',
            'Category_description' => 'required',
            'Category_image_url' => 'required',
        ]);
    
        
        
        if($request->hasfile('Category_image_url'))
         {
                $name = $request->Category_name.time().'.'.$request->Category_image_url->extension();
                $request->Category_image_url->move(public_path().'/files/', $name);
                
         }
      
        $varCategory = new Category([
             'Category_name' => $request->Category_name,
         'Category_description' => $request->Category_description,
          'Category_image_url' =>  $name,
         ]);
         $varCategory->save();
         
        
        return redirect()->route('categories.index')
                        ->with('success','Category created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         request()->validate([
            'Category_name' => 'required',
            'Category_description' => 'required',
            'Category_image_url' => 'required',
        ]);
    
        $category->update($request->all());
    
        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    
        return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
    }
}
