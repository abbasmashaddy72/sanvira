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
        'account_type',
        'slug',
        'image',
    ];

    public static $enumCasts = [
        'account_type' => 'Regular,Featured',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function brandViews()
    {
        return $this->hasMany(BrandView::class, 'brand_id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
