<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User; 
use App\Models\Order; 
use Mail;
use App\Mail\OrderConfirmationMail; 
use App\Mail\OrderDeliveredMail; 
use App\Mail\OrderRejectedMail; 
use App\Jobs\OrderConfirmationjob; 
use App\Jobs\OrderDeliveredjob; 
use App\Jobs\ActivateAccountjob; 
use App\Jobs\OrderRejectedjob;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $OrderInfo = DB::table("Orders")
                                ->join("users", "users.id", "Orders.Order_user_id")
                                 ->get()->toArray();
        //return $OrderInfo; 
        return view("Order/Index", compact("OrderInfo")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersInfo = User::get(); 

        $OrderInfo = DB::table("orders")
        ->join("users", "users.id", "orders.Order_user_id")
        ->get()->toArray(); 
        return $OrderInfo;
        return view("Order/Create", compact("OrderInfo")); 
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
                'Order_user_id' => "Required", 
                // 'Order_product_Quantity' => "Required", 
                // 'Order_total_cost' => "Required", 
                // 'Order_status' => "Required", 
          //      'Ordered_product_order_id' => "Required",
            'Ordered_product_quantity' => "Required",
            'Ordered_product_cost' => "Required",
            'Ordered_product_total_cost' => "Required",
            'Ordered_product_order_status' => "Required",
            'Ordered_product_product_id' => "Required"

        ]); 

        $inputs = $request->all(); 
        Order::create($inputs); 
        return redirect("orders"); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $OrdersInfo = Order::find($id); 
        $OrdersInfo->Order_status = 1; 
        $OrdersInfo->save(); 

        $user = User::find($OrdersInfo->Order_user_id); 

        $mail=$user->email;
        // echo "Accepted  "; 
        // return $mail; 
        $key = "ACCEPTORDER";
//        Mail::to("$this->mail")->send(new OrderConfirmationMail($this->OrdersInfo));
      //  Mail::to($mail)->send(new OrderConfirmationMail($OrdersInfo));
        //return $OrdersInfo->Order_product_quantity;
        $this->dispatch(new OrderConfirmationJob($mail, $OrdersInfo));

      //  Mail::to("$mail")->send(new OrderConfirmationMail());

        return redirect("orders"); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $OrdersInfo = Order::find($id); 
        $OrdersInfo->Order_status = 2; 
        $OrdersInfo->save(); 
        
        $user = User::find($OrdersInfo->Order_user_id); 

        $mail=$user->email;
//        echo "Delivered"; 

        $key = "DELIVERORDER"; 
   //     $this->dispatch(new OrderDeliveredjob($mail, $key, $OrdersInfo));
        $this->dispatch(new OrderDeliveredjob($mail, $OrdersInfo));

      //  return $mail; 
        //data = $data;
    //    Mail::to("$mail")->send(new OrderDeliveredMail());


        return redirect("orders");
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
        //reject
        $OrdersInfo = Order::find($id); 
        $OrdersInfo->Order_status = 3; 
        $OrdersInfo->save(); 

        $user = User::find($OrdersInfo->Order_user_id); 

        $mail=$user->email;
        
     //   return $mail; 
        $key = "REJECTED";
        //return $key;
 //       return $OrdersInfo;
        //$this->mailSubject=$mailSubject;

        $this->dispatch(new OrderRejectedjob($mail, $OrdersInfo));

        return redirect("orders");
    }
}
