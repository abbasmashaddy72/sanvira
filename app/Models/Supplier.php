<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model  implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_email',
        'company_address',
        'company_number',
        'company_locality',
        'tagline',
        'logo',
        'yoe',
        'website_url',
        'description',
        'terms_conditions',
        'contact_person_name',
        'contact_person_email',
        'contact_person_number',
    ];
}
