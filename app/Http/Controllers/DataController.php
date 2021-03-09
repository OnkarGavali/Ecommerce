<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function CatList()
    {

        $categories = DB::table('categories')
        ->where([['Category_status', '=', 1]])
        ->orderBy('Category_id', 'desc')
        ->get()->toArray();
        $i=0;
        return view('lists.categories',compact('categories','i'));
            
    }

    public function SubCatList(Category $category)
    {
        //return dd($category);
        $subcategories = DB::table('sub_categories')
        ->where([['Subcategory_category_id', '=',$category->Category_id]])
        ->orderBy('Subcategory_id', 'desc')
        ->get()->toArray();
        $i=0;
        return view('lists.subcategories',compact('subcategories','i','category'));
    }

    public function ProList(Category $category,Subcategory $subcategory)
    {
        //return dd($category);
        $products = DB::table('products')
        ->where([['Product_subcategory_id', '=',$subcategory->Subcategory_category_id]])
        ->orderBy('Product_id', 'desc')
        ->get()->toArray();
        $i=0;
        return view('lists.products',compact('products','i'));
    }
}
