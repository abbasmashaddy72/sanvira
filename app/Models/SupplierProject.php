<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'name',
        'country_id',
        'city',
        'description',
        'year_range',
        'images',
        'feedback',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
