<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_product_id',
        'user_id',
        'quantity',
    ];

    public function supplierProducts()
    {
        return $this->belongsTo(SupplierProduct::class, 'supplier_product_id');
    }
}
