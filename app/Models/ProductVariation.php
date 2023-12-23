<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'country_id',
        'avb_stock',
        'sku',
        'barcode',
        'length',
        'breadth',
        'width',
        'diameter',
        'measurement_units',
        'weight',
        'weight_units',
        'quantity_type',
        'color',
        'item_type',
        'max_discount',
        'max_discount_unit',
        'tax_percentage',
        'min_price',
        'max_price',
        'min_order_quantity',
        'max_order_quantity',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_variations')->withPivot([
            'product_id',
            'country_id',
            'avb_stock',
            'sku',
            'barcode',
            'length',
            'breadth',
            'width',
            'diameter',
            'measurement_units',
            'weight',
            'weight_units',
            'quantity_type',
            'color',
            'item_type',
            'max_discount',
            'max_discount_unit',
            'tax_percentage',
            'min_price',
            'max_price',
            'min_order_quantity',
            'max_order_quantity',
        ]);
    }
}
