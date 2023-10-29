<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'country_id',
        'state_id',
        'name',
        'state_code',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function billingAddresses()
    {
        return $this->hasMany(BillingAddress::class);
    }
}
