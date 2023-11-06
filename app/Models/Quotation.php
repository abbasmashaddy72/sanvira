<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquiry_id',
        'quotation_no',
        'status'
    ];

    public static $enumCasts = [
        'status' => 'Open,Revise,Revised,Approved,Rejected',
    ];

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class, 'enquiry_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'quotation_product');
    }
}
