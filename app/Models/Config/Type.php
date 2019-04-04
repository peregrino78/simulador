<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'configs_type';

    protected $fillable = ['name', 'active'];
}
