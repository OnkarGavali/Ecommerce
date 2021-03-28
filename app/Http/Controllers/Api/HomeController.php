<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
class HomeController extends Controller
{
    //
    public function HomePageCat()
    {
        
        $categories = DB::table('categories')
        ->where([['Category_status', '=', 1]])
        ->orderBy('Category_id', 'desc')
        ->get()->toArray();
        return response()->json(['categorylist'=>$categories]);
        //return view('lists.products',compact('products','categories','i'));
    }
    public function HomePageSub()
    {
        
        $subcategories = DB::table('sub_categories')
        ->where([['Subcategory_status', '=', 1]])
        ->orderBy('Subcategory_id', 'desc')
        ->get()->toArray();
        return response()->json(['subcategorylist'=>$subcategories]);
        //return view('lists.products',compact('products','categories','i'));
    }
    public function HomePagePro()
    {
        $products = DB::table('products')
        ->where([['Product_status', '=', 1]])
        ->orderBy('Product_id', 'desc')
        ->get()->toArray();
        return response()->json(['productlist'=>$products]);
        //return view('lists.products',compact('products','categories','i'));
    }
}
