<?php

namespace App\Models;

use Illuminate\Support\Str;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
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
        return $this->hasMany(Product::class, 'category_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'id', 'parent_id');
    }

    public function categoryViews()
    {
        return $this->hasMany(CategoryView::class, 'category_id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
