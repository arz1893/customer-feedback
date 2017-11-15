<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantCategory extends Model
{
    protected $table = 'tenant_categories';

    protected $fillable = [
        'name'
    ];

    public function tenants() {
        return $this->hasMany(Tenant::class);
    }
}
