<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'region',
        'name',
        'phone_code',
        'capital',
        'currency',
        'currency_symbol',
    ];

    public function states()
    {
        return $this->hasMany(State::class, 'country_id', 'id');
    }
}
