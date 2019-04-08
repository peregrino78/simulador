<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgreementParticularitie extends Model
{
    protected $table = 'agreements_particularities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['agreement_id', 'description', 'age_limit',  'parcel_limit'];    
}
