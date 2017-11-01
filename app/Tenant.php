<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenants';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'phone',
        'city',
        'description',
        'country',
        'province',
        'image_path',
        'logo_path',
        'memo',
        'category_id'
    ];

    public function tenant_category() {
        return $this->belongsTo(TenantCategory::class, 'category_id');
    }

    public function master_products() {
        return $this->hasMany(MasterProduct::class);
    }

    public function master_services() {
        return $this->hasMany(MasterService::class);
    }
}
