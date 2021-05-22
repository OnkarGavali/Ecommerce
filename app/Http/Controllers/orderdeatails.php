<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User; 
use App\Models\Order; 
use App\Models\OrderedProducts; 
use Mail;
use App\Mail\OrderConfirmationMail; 
use App\Mail\OrderDeliveredMail; 
use App\Mail\OrderRejectedMail; 
use App\Jobs\OrderConfirmationjob; 
use App\Jobs\OrderDeliveredjob; 
use App\Jobs\ActivateAccountjob; 
use App\Jobs\OrderRejectedjob;


class orderdeatails extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $OrdersInfo = DB::table('ordered_products')
        ->where([['Ordered_product_order_id', '=',$id]])
        ->join('products','products.Product_id','ordered_products.Ordered_product_product_id')
        ->get()->toArray();
        $i=0;
        return view('Order.orderlist',compact('OrdersInfo','i'));
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
        //
    }
}
