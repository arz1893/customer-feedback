<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterProduct extends Model
{
    protected $table = 'master_products';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'specification',
        'cover_image',
        'tenant_id'
    ];

    public function tenant() {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function master_product_images() {
        return $this->hasMany(MasterProductImage::class);
    }

    public function faqs() {
        return $this->hasMany(Faq::class);
    }
}
