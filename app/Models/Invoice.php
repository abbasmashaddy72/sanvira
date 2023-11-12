<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_note_id',
        'buyer_id',
        'staff_id',
        'invoice_no',
        'delivery_note_submission_date_time',
        'status',
    ];

    public static $enumCasts = [
        'status' => 'Open,Approved,Resubmit',
    ];

    protected $casts = [
        'delivery_note_submission_date_time' => 'datetime:Y-m-d h:i:s'
    ];

    public function deliveryNote()
    {
        return $this->belongsTo(DeliveryNote::class, 'delivery_note_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_product')->withPivot([
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
