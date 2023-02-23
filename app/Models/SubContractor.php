<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubContractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'number',
        'locality',
        'description',
        'terms_conditions',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function subContractorProjects()
    {
        return $this->belongsTo(SubContractorProject::class);
    }

    public function subContractorServices()
    {
        return $this->belongsTo(SubContractorService::class);
    }
}
