<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfq_id',
        'user_id',
        'submission_time',
        'status',
    ];

    public static $enumCasts = [
        'status' => 'Open,Close',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'enquiry_product');
    }

    public function user()
    {
        return $this->belongsTo(Order::class, 'user_id');
    }
}
