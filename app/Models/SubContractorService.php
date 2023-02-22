<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubContractorService extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_contractor_id',
        'name',
        'image',
        'parent_id',
    ];
}
