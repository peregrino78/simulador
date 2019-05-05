<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'cpf', 'birthday', 'state_id', 'city_id'];

    protected $dates = ['birthday'];

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
