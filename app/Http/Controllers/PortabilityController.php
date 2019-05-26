<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Models\OperationType;
use App\Models\Simulation\Data;

class PortabilityController extends Controller
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
        
        return view('dashboard.operations.portabilidade.create', compact('agreements', 'operations', 'client_id'));
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
            'agreement_id'          => 'required',
            'balance_due'           => 'required',
            'parcels_quantity'      => 'required',
        ];

        $nicenames = [
            'agreement_id'          => 'Convênio',
            'balance_due'           => 'Saldo Devedor',
            'parcels_quantity'      => 'Quantidade de Parcelas',
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
