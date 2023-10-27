<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'rfq_id',
        'status',
        'rfq_submission_date',
    ];

    public function rfq()
    {
        return $this->belongsTo(Rfq::class);
    }
}
