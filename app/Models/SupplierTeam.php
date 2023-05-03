<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'name',
        'designation',
        'image',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
