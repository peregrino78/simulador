<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    protected $table = 'agreements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function particularities()
    {
        return $this->hasOne('App\Models\AgreementParticularitie', 'agreement_id');
    }
}
