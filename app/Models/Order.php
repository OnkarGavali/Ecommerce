<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /*
    0. Pending
    1. Accepeted
    2. Delivered
    3. Rejected
    */
    use HasFactory;
    protected $fillable = [
        'Order_user_id',
        'Order_product_Quantity',
        'Order_total_cost',
        'Order_status',
    ];
    protected $primaryKey = 'Order_id';
}
