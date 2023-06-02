<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kirschbaum\PowerJoins\PowerJoins;

class BrandTransaction extends Model
{
    use HasFactory;
    use PowerJoins;

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
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
