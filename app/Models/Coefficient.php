<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coefficient extends Model
{
    protected $table = 'coefficients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['term', 'rate', 'factor', 'date', 'agreement_id', 'operation_type_id'];

    protected $dates = ['date'];

    public function agreement()
    {
        return $this->belongsTo('App\Models\Agreement', 'agreement_id');
    }

    public function operation()
    {
        return $this->belongsTo('App\Models\OperationType', 'operation_type_id');
    }
}
