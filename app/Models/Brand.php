<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function products()
    {
        return $this->belongsTo(SupplierProduct::class, 'id', 'brand_id');
    }

    public function transactions()
    {
        return $this->belongsTo(BrandTransaction::class, 'id', 'brand_id');
    }
}
