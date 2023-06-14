<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supplier_id',
        'clicks',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id')->select('id', 'company_name');
    }
}
