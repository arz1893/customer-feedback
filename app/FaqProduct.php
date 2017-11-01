<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqProduct extends Model
{
    protected $table = 'faq_products';

    protected $fillable = [
        'question',
        'answer',
        'master_product_id',
        'child',
        'parent'
    ];

    public function master_product() {
        return $this->belongsTo(MasterProduct::class, 'master_product_id');
    }
}
