<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class SupplierProduct extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $fillable = [
        'supplier_id',
        'supplier_product_category_id',
        'country_id',
        'brand_id',
        'manufacturer_id',
        'name',
        'description',
        'min_oq',
        'max_oq',
        'edt',
        'avb_stock',
        'model',
        'item_type',
        'sku',
        'on_sale',
        'images',
        'price',
        'min_price',
        'max_price',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function manufacturers()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

    public function supplierProductCategory()
    {
        return $this->belongsTo(SupplierProductCategory::class, 'supplier_product_category_id');
    }

    public function productAttributes()
    {
        return $this->hasMany(SupplierProductAttributes::class, 'supplier_product_id', 'id');
    }
}
