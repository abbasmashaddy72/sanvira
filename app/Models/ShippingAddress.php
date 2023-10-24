<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city_id',
        'company_name',
        'street_no',
        'locality',
        'landmark',
        'zip_code',
    ];
}
