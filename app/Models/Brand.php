<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(SupplierProduct::class, 'brand_id');
    }

    public function transactions()
    {
        return $this->belongsTo(BrandTransaction::class, 'id', 'brand_id');
    }

    public function brandViews()
    {
        return $this->hasMany(SupplierBrandView::class, 'brand_id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
