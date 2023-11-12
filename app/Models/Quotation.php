<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquiry_id',
        'buyer_id',
        'staff_id',
        'quotation_no',
        'enquiry_submission_date_time',
        'status'
    ];

    public static $enumCasts = [
        'status' => 'Open,Revise,Revised,Approved,Rejected',
    ];

    protected $casts = [
        'enquiry_submission_date_time' => 'datetime:Y-m-d h:i:s'
    ];

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class, 'enquiry_id');
    }

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
        return $this->belongsToMany(Product::class, 'quotation_product')->withPivot([
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
}
