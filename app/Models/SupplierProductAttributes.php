<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProductAttributes extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_product_id',
        'name',
        'value',
    ];
}
