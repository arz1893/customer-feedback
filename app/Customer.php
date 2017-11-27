<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'address',
        'nation',
        'city',
        'email',
        'gender',
        'phone',
        'birthdate',
        'memo',
        'tenant_id'
    ];

    public function tenant() {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function complaint_product() {
        return $this->hasMany(ComplaintProduct::class);
    }
}
