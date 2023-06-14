<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierManufacturerView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supplier_id',
        'manufacturer_id',
        'clicks',
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
}
