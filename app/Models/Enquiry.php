<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfq_id',
        'user_id',
        'enquiry_no',
        'submission_date_time',
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
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rfq()
    {
        return $this->belongsTo(Rfq::class, 'rfq_id');
    }
}
