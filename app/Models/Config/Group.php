<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group_configs';

    public function configs()
    {
        return $this->hasMany('App\Models\Config', 'group_id');
    }
}
