<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'Order_user_id',
        'Order_product_Quantity',
        'Order_total_cost',
        'Order_status',
    ];
    protected $primaryKey = 'Order_id';
}
