<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderedProducts;
use Validator;

class OrderController extends Controller
{

  public function PlaceOrder(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'order' =>'required'
    ]);
$user = $request->user();
    if ($validator->fails()) {
        $responseArr['error'] = $validator->errors()->first();
        return response()->json($responseArr, 400);
    }

    $varOrder = new Order([
              'Order_user_id'=>$user->id,
              'Order_product_Quantity'=>count($request->order),
              'Order_total_cost'=>-1,
              'Order_status'=>0,
          ]);
    $varOrder->save();
    $i=0;
    $total=0;
    for($i; $i<count($request->order); $i++)
    {
      $product= $request->order[$i]['product'];
      echo "---------------------string-------------------------------";
      print_r($product);
      echo "---------------------id-------------------------------";
      print_r($product['Product_id']);
      echo "---------------------myid-------------------------------";
      $varProduct =  Product::find($product['Product_id']);
      echo "---------------------quantity-------------------------------";
      $quantity= $request->order[$i]['quantity'];
      echo "---------------------quantity-------------------------------";
      echo "---------------------Product-------------------------------";
      print_r($varProduct);
      echo "---------------------Product-------------------------------";
      $varOrderedProducts = new OrderedProducts([
            'Ordered_product_order_id'=>$varOrder->Order_id,
            'Ordered_product_quantity'=>$quantity,
            'Ordered_product_cost'=>$varProduct->Product_prize,
            'Ordered_product_total_cost'=>$quantity*$varProduct->Product_prize,
            'Ordered_product_product_id'=>$varProduct->Product_id
          ]);
          $varOrderedProducts->save();

      $total= $total+$quantity*$varProduct->Product_prize;
    }
    $varOrder2 =  Order::find($varOrder->Order_id);
    $varOrder2->Order_total_cost = $total;
    $varOrder2->save();

      return response()->json(['code'=>200]);
  }

  public function ClientAllOrders(Request $request)
  {
    $user = $request->user();
    $Orders = DB::table('orders')
    ->where('Order_user_id', '=', $user->id)
    ->orderBy('Order_id', 'desc')
    ->get()->toArray();

      return response()->json(['OrderList'=>$Orders,
      'code'=>200]);
  }

  public function OrderDeatils(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'OrderId' =>'required'
    ]);

    if ($validator->fails()) {
        $responseArr['error'] = $validator->errors()->first();
        return response()->json($responseArr, 400);
    }
    $Orders = DB::table('ordered_products')
    ->where('Ordered_product_order_id', '=', $request->OrderId)
    ->join('products','products.Product_id','=','ordered_products.Ordered_product_product_id')
    ->get()->toArray();

      return response()->json(['OrderList'=>$Orders,
      'code'=>200]);
  }
}
