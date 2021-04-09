<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProducts extends Model
{
    use HasFactory;
    protected $fillable = [

            'Ordered_product_order_id',
            'Ordered_product_quantity',
            'Ordered_product_cost',
            'Ordered_product_total_cost',
            'Ordered_product_order_status',
            'Ordered_product_product_id'
    ];
    protected $primaryKey = 'Ordered_product_id';
}
