<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'brand_id',
        'clicks',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function userData()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}