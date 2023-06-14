<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProductCategoryView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supplier_id',
        'supplier_product_category_id',
        'clicks',
    ];

    public function supplierProductCategory()
    {
        return $this->belongsTo(SupplierProductCategory::class, 'supplier_product_category_id');
    }
}
