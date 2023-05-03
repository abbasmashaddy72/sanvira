<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'account_type',
        'transaction_type',
        'amount',
        'start_date',
        'end_days',
        'image',
        'status',
    ];

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
