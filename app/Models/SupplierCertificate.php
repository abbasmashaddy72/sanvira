<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'title',
        'attachment',
        'type',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
