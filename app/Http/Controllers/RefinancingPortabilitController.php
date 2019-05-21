<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Models\OperationType;
use App\Models\Simulation\Data;

class RefinancingPortabilitController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $client_id = $id;
        $agreements = Agreement::pluck('name', 'id');
        $operations = OperationType::pluck('name', 'id');
        
        return view('dashboard.operations.refin-portabilidade.create', compact('agreements', 'operations', 'client_id'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'balance_due'           => 'required',
            'contract_term'         => 'required',
            'paid_parcels'          => 'required',
            'open_parcels'          => 'required',
            'current_parcel_value'  => 'required',
            'desired_parcel'        => 'required',
            'date'                  => 'required',
            'agreement_id'          => 'required'
        ];

        $nicenames = [
            'balance_due'           => 'Saldo Devedor',
            'contract_term'         => 'Prazo Contratado',
            'paid_parcels'          => 'Parcelas Pagas',
            'open_parcels'          => 'Parcelas Abertas',
            'current_parcel_value'  => 'Valor Parcela Atual',
            'desired_parcel'        => 'Valor Parcela Desejada',
            'date'                  => 'Data',
            'agreement_id'          => 'Convênio'
        ];

        $this->validate($request, $rules, [], $nicenames);

        $data = $request->request->all();

        $simulation = Data::create($data);
        
        if($simulation)
        {
            return redirect()->route('simulation_result');
        }
    }

}
