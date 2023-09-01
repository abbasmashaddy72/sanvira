<?php

namespace App\Models;

use Illuminate\Support\Str;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'title',
        'slug',
        'description',
        'min_oq',
        'max_oq',
        'edt',
        'avb_stock',
        'model',
        'item_type',
        'sku',
        'barcode',
        'own_sku',
        'length',
        'length_units',
        'breadth',
        'breadth_units',
        'width',
        'width_units',
        'weight',
        'weight_units',
        'on_sale',
        'images',
        'data_sheets',
        'price',
        'min_price',
        'max_price',
        'verification',
    ];

    protected $casts = [
        'images' => 'array',
        'data_sheets' => 'array',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
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

    public function productViews()
    {
        return $this->hasMany(SupplierProductView::class, 'supplier_product_id');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
