<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierTermCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'description',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }
}
