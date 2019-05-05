<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'state_id'];


    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }
}
