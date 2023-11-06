<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rfq extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rfq_no',
        'status',
    ];

    public static $enumCasts = [
        'status' => 'Pending,Submitted,Processing,Close',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'rfq_product')->withPivot('quantity');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'rfq_id');
    }

    public function users()
    {
        return $this->belongsToMany(Order::class, 'user_id');
    }
}
