<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'customer_id',
        'question',
        'answer',
        'is_need_call',
        'tenant_id'
    ];

    public function tenant() {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
