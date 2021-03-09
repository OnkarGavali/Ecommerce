<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'Owner_name',
        'Owner_shop_name',
        'Owner_gst_no',
        'Owner_mobile_no',
        'Owner_email',
    ];
    protected $primaryKey = 'Owner_id';
}
