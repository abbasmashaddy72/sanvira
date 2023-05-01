<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

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

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function supplierCertificates()
    {
        return $this->hasMany(SupplierCertificate::class);
    }

    public function supplierProducts()
    {
        return $this->belongsTo(SupplierProduct::class, 'id', 'supplier_id');
    }

    public function supplierProductCatagories()
    {
        return $this->belongsTo(SupplierProductCategory::class);
    }

    public function supplierProjects()
    {
        return $this->belongsTo(SupplierProject::class);
    }

    public function supplierTeams()
    {
        return $this->belongsTo(SupplierTeam::class);
    }

    public function supplierTestimonials()
    {
        return $this->belongsTo(SupplierTestimonial::class);
    }
}
