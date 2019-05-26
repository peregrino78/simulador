<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Models\OperationType;
use App\Models\Simulation\Data;

class NewContractController extends Controller
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
        
        return view('dashboard.operations.contrato-novo.create', compact('agreements', 'operations', 'client_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $rules = [];

        //Se operação for Valor da Parcela
        if($request->operation == 1)
        {
            $rules += [
                'value_desired'     => 'required',
            ];
        }

        //Se operação dor Valor do Empréstimo
        if($request->operation == 2)
        {
            $rules += [
                'desired_parcel'    => 'required',
            ];
        }
        

        $rules += [    
            'parcels_quantity'      => 'required',
            'agreement_id'          => 'required'
        ];

        $nicenames = [
            'value_desired'         => 'Valor Desejado',
            'desired_parcel'        => 'Valor Parcela Desejada',
            'parcels_quantity'      => 'Quantidade de Parcelas',
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
