<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Supplier extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_email',
        'company_address',
        'company_number',
        'company_locality',
        'tagline',
        'logo',
        'doe',
        'license',
        'type',
        'website_url',
        'description',
        'terms_conditions',
        'agree',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function products()
    {
        return $this->belongsTo(SupplierProduct::class, 'id', 'supplier_id');
    }

    public function transactions()
    {
        return $this->belongsTo(SupplierTransaction::class, 'id', 'supplier_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(600);
    }
}
