<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'name',
        'image',
        'parent_id',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function products()
    {
        return $this->hasMany(SupplierProduct::class, 'supplier_product_category_id');
    }
}
