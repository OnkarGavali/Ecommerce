<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Validator;
class HomeController extends Controller
{
    //
    public function HomePageCat()
    {

        $categories = DB::table('categories')
        ->where([['Category_status', '=', 1]])
        ->orderBy('Category_id', 'desc')
        ->get()->toArray();
        return response()->json(['CategoryList'=>$categories,
                                  'code'=>200]);

    }
    public function HomePageSub(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'Subcategory_category_id' =>'required'
      ]);

      if ($validator->fails()) {

          $responseArr['error'] = $validator->errors()->first();
          return response()->json($responseArr, 400);
      }
        $subcategories = DB::table('sub_categories')
        ->where([['Subcategory_status', '=', 1],
                  ['Subcategory_category_id','=',$request->Subcategory_category_id]])
        ->orderBy('Subcategory_id', 'desc')
        ->get()->toArray();
        return response()->json(['SubcategoryList'=>$subcategories,
        'code'=>200]);

    }
    public function HomePagePro(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Product_subcategory_id' =>'required'
        ]);

        if ($validator->fails()) {
            $responseArr['error'] = $validator->errors()->first();
            return response()->json($responseArr, 400);
        }

        $products = DB::table('products')
        ->where('Product_status', '=', 1)
        ->orderBy('Product_id', 'desc')
        ->get()->toArray();

        return response()->json(['ProductList'=>$products,
        'code'=>200]);
    }

    public function AllProducts()
    {
        $products = DB::table('products')
        ->where([['Product_subcategory_id','=',$request->Product_subcategory_id],
        ['Product_status', '=', 1]])
        ->orderBy('Product_id', 'desc')
        ->get()->toArray();

        return response()->json(['AllProductList'=>$products,
        'code'=>200]);
    }
}
