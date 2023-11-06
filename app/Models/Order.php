<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'order_no',
        'purchase_order_pdf',
        'rfq_submission_date',
        'status',
    ];

    public static $enumCasts = [
        'status' => 'Open,Close',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product');
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
