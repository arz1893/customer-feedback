<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintService extends Model
{
    protected $table = 'complaint_services';

    protected $fillable = [
        'customer_rating',
        'customer_complaint',
        'is_need_call',
        'is_urgent',
        'customer_id',
        'master_service_id',
        'service_category_id',
        'tenant_id'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function master_service() {
        return $this->belongsTo(MasterService::class, 'master_service_id');
    }

    public function service_category() {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function tenant() {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
