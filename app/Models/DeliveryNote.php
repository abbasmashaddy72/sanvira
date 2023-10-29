<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'delivery_notes_attachment',
        'status',
    ];

    public static $enumCasts = [
        'status' => 'Open,Close',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'delivery_note_product');
    }
}
