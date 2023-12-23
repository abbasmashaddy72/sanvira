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
        return $this->belongsToMany(Product::class, 'rfq_product')->withPivot([
            'id',
            'product_id',
            'size',
            'weight',
            'diameter',
            'quantity_type',
            'color',
            'item_type',
            'quantity',
        ]);
    }
}
