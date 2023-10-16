<?php

namespace App\Models;

use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductView extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $fillable = [
        'user_id',
        'product_id',
        'clicks',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->select('id', 'title');
    }

    public function userData()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
