<?php

namespace App\Models\Simulation;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'simulation_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parcels_quantity', 'value_desired', 'balance_due', 'contract_term', 'paid_parcels', 'open_parcels', 'current_parcel_value',
    'desired_parcel', 'date', 'client_id', 'operation_type_id', 'agreement_id'];

    protected $dates = ['date'];

    
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function operation()
    {
        return $this->belongsTo('App\Models\OperationType', 'operation_type_id');
    }

    public function agreement()
    {
        return $this->belongsTo('App\Models\Agreement', 'agreement_id');
    }
}
