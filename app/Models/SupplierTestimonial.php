<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierTestimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'name',
        'logo',
        'message',
        'year',
        'rating',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }
}
