<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'discount',
        'tax_percentage',
        'min_price',
        'max_price',
        'min_order_quantity',
        'max_order_quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
