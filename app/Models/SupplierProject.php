<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'name',
        'country',
        'city',
        'description',
        'year_range',
        'images',
        'feedback',
    ];
}
