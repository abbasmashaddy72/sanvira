<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'invoice_no',
        'status',
    ];

    public static $enumCasts = [
        'status' => 'Open,Approved,Resubmit',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_product');
    }
}
