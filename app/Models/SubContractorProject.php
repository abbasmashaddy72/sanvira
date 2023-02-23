<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubContractorProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_contractor_id',
        'name',
        'country',
        'city',
        'description',
        'year_range',
        'images',
        'feedback',
    ];

    public function subContractors()
    {
        return $this->belongsTo(SubContractor::class);
    }
}
