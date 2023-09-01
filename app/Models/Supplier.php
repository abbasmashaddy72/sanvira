<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Supplier extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'company_name',
        'slug',
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
        'verification',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function manager()
    {
        return $this->hasOne(SupplierTeam::class, 'user_id', 'user_id');
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

    public function setCompanyNameAttribute($value)
    {
        $this->attributes['company_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
