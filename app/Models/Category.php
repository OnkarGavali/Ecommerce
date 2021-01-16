<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'Category_name',
        'Category_description',
        'Category_image_url',
        'Category_status',
    ];

    protected $primaryKey = 'Category_id';


}
