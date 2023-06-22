<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class SupplierProductCategory extends Model
{
    use HasFactory;

    use PowerJoins;

    protected $fillable = [
        'name',
        'image',
        'parent_id',
    ];

    public function products()
    {
        return $this->hasMany(SupplierProduct::class, 'supplier_product_category_id');
    }

    public function categories()
    {
        return $this->hasMany(SupplierProductCategory::class, 'id', 'parent_id');
    }

    public function categoryViews()
    {
        return $this->hasMany(SupplierProductCategoryView::class, 'supplier_product_category_id');
    }
}
