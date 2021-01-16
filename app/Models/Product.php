<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    protected $fillable = [
        'Product_name',
        'Product_description',
        'Product_image_url1',
        'Product_image_url2',
        'Product_image_url3',
        'Product_image_url4',
        'Product_image_url5',
        'Product_size',
        'Product_color',
        'Product_prize',
        'Product_status',
        'Product_subcategory_id',
    ];

    protected $primaryKey = 'Product_id';
}