<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterService extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'tenant_id',
        'cover_image'
    ];

    public function tenant() {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
