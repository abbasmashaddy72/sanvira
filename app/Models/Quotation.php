<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquiry_id',
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
