<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'Subcategory_name',
        'Subcategory_description',
        'Subcategory_image_url',
        'Subcategory_status',
        'Subcategory_category_id',
    ];

    protected $primaryKey = 'Subcategory_id';
}
