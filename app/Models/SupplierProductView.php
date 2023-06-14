<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProductView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supplier_id',
        'supplier_product_id',
        'clicks',
    ];

    public function supplierProduct()
    {
        return $this->belongsTo(SupplierProduct::class, 'supplier_product_id');
    }
}
