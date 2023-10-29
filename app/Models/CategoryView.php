<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'clicks',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'name');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'category_id')->select('id', 'name');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
