<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterProductImage extends Model
{
    protected $table = 'master_product_images';

    protected $fillable = [
        'name',
        'size',
        'path',
        'master_product_id'
    ];

    public function master_product() {
        return $this->belongsTo(MasterProduct::class, 'master_product_id');
    }
}
