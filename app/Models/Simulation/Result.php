<?php

namespace App\Models\Simulation;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'simulation_result';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['balance', 'parcel', 'change', 'result', 'santander_rate', 'id_simulation_data', 'id_users'];


    public function simulation()
    {
        return $this->belongsTo('App\Models\Simulation\Data', 'id_simulation_data');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_users');
    }
}
