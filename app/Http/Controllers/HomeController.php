<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User; 
use App\Models\Order; 
use App\Models\Product; 
use App\Models\OrderedProducts; 
use Mail;
use App\Mail\OrderConfirmationMail; 
use App\Mail\OrderDeliveredMail; 
use App\Mail\OrderRejectedMail; 
use App\Jobs\OrderConfirmationjob; 
use App\Jobs\OrderDeliveredjob; 
use App\Jobs\ActivateAccountjob; 
use App\Jobs\OrderRejectedjob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

        $unique_Products = Product::all();

        $all_Product_count = [];

       

        for($x=0; $x<count($unique_Products); $x++)
        {
            
            $OrdersInfo = DB::table('ordered_products')
            ->where([['Ordered_product_product_id', '=',$unique_Products[$x]->Product_id]])
            ->count();
          
            $unique_Products[$x]->count1 = $OrdersInfo;
           
        }
        $i=0;
        
        return view('home',compact('unique_Products','i'));
        
    }
}
