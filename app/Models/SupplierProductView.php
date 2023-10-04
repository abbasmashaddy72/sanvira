<?php

namespace App\Models;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierProductView extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $fillable = [
        'user_id',
        'supplier_id',
        'supplier_product_id',
        'clicks',
    ];

    public function supplierProduct()
    {
        return $this->belongsTo(SupplierProduct::class, 'supplier_product_id')->select('id', 'title');
    }

    public function userData()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
