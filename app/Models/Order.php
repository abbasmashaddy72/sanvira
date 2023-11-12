<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'buyer_id',
        'staff_id',
        'order_no',
        'quotation_submission_date_time',
        'purchase_order_pdf',
        'status',
    ];

    public static $enumCasts = [
        'status' => 'Open,Close',
    ];

    protected $casts = [
        'quotation_submission_date_time' => 'datetime:Y-m-d h:i:s'
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot([
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

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class, 'rfq_id');
    }

    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'quotation_id');
    }

    public function deliveryNote()
    {
        return $this->hasOne(DeliveryNote::class, 'order_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id');
    }
}
