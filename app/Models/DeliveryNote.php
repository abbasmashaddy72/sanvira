<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'buyer_id',
        'staff_id',
        'delivery_note_no',
        'order_submission_date_time',
        'delivery_notes_attachment',
        'status',
    ];

    public static $enumCasts = [
        'status' => 'Open,Close',
    ];

    protected $casts = [
        'order_submission_date_time' => 'datetime:Y-m-d h:i:s'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'delivery_note_product')->withPivot([
            'id',
            'product_id',
            'brand_id',
            'size',
            'weight',
            'diameter',
            'quantity_type',
            'color',
            'item_type',
            'quantity',
            'our_price',
            'client_price',
        ]);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
