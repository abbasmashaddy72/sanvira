<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'account_type',
        'transaction_type',
        'amount',
        'start_date',
        'end_days',
        'image',
        'status',
    ];

    public function suppliers()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }
}
