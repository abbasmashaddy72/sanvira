<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vendor_id',
        'clicks',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function userData()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
