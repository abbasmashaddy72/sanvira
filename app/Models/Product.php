<?php

namespace App\Models;

use Illuminate\Support\Str;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $fillable = [
        'category_id',
        'country_id',
        'brand_id',
        'vendor_id',
        'title',
        'slug',
        'description',
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
        'verification',
    ];

    protected $casts = [
        'images' => 'array',
        'data_sheets' => 'array',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function vendors()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttributes::class, 'product_id', 'id');
    }

    public function productViews()
    {
        return $this->hasMany(ProductView::class, 'product_id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
