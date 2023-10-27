<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rfq extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_rfq')->withPivot('quantity');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'rfq_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(Order::class, 'user_id');
    }
}
