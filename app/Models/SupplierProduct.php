<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'supplier_product_category_id',
        'name',
        'description',
        'min_max_oq',
        'edt',
        'avb_stock',
        'manufacturer',
        'brand',
        'model',
        'item_type',
        'sku',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function supplierProductCategory()
    {
        return $this->belongsTo(SupplierProductCategory::class);
    }
}
