<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'Banner_title',
        'Banner_Image_Path' 
    ];

    protected $primaryKey = 'Banner_id';

}
