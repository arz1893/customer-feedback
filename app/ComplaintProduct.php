<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintProduct extends Model
{
    protected $table = 'complaint_products';

    protected $fillable = [
        'customer_rating',
        'customer_complaint',
        'is_need_call',
        'is_urgent',
        'tenant_id',
        'customer_id',
        'master_product_id',
        'sub_master_product_id'
    ];

    public function tenant() {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function master_product() {
        return $this->belongsTo(MasterProduct::class, 'master_product_id');
    }
}
