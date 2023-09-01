<?php

namespace App\Models;

use Illuminate\Support\Str;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierProductCategory extends Model
{
    use HasFactory;

    use PowerJoins;

    protected $fillable = [
        'name',
        'slug',
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

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
