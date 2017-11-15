<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqService extends Model
{
    protected $table = 'faq_services';

    protected $fillable = [
        'question',
        'answer',
        'master_service_id',
        'parent',
        'child'
    ];

    public function master_service() {
        return $this->belongsTo(MasterService::class, 'master_service_id');
    }
}
