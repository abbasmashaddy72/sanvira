<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfq_id',
        'buyer_id',
        'staff_id',
        'enquiry_no',
        'rfq_submission_date_time',
        'status',
    ];

    public static $enumCasts = [
        'status' => 'Open,Close',
    ];

    protected $casts = [
        'rfq_submission_date_time' => 'datetime:Y-m-d h:i:s'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'enquiry_product')->withPivot([
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

    public function rfq()
    {
        return $this->belongsTo(Rfq::class, 'rfq_id');
    }
}
