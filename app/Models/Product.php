<?php

namespace App\Models;

use Illuminate\Support\Str;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use PowerJoins;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'edt',
        'model',
        'on_sale',
        'images',
        'data_sheets',
    ];

    protected $casts = [
        'images' => 'array',
        'data_sheets' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttributes::class, 'product_id', 'id');
    }

    public function productViews()
    {
        return $this->hasMany(ProductView::class, 'product_id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function enquiries()
    {
        return $this->belongsToMany(Enquiry::class, 'enquiry_product');
    }

    public function quotations()
    {
        return $this->belongsToMany(Quotation::class, 'quotation_product');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }

    public function deliveryNotes()
    {
        return $this->belongsToMany(DeliveryNote::class, 'delivery_note_product');
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_product');
    }
}
