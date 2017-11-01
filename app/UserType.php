<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_types';

    protected $fillable = [
        'name',
        'sysbuiltin',
        'pattern'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
