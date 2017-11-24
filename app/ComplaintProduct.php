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
        'product_category_id'
    ];

    public function tenant() {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function master_product() {
        return $this->belongsTo(MasterProduct::class, 'master_product_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product_category() {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
