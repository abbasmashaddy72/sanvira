<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(SupplierProduct::class, 'manufacturer_id');
    }

    public function manufacturerViews()
    {
        return $this->hasMany(SupplierManufacturerView::class, 'manufacturer_id');
    }
}
