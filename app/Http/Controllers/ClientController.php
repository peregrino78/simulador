<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.simulations.client.create');
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
            'name'      => 'required',
            'cpf'       => 'required | unique:clients',
            'birthday'  => 'required',
        ];

        $messages = [
            'cpf.unique' => 'Este CPF já está cadastrado!'
        ];

        $nicenames = [
            'name'      => 'Nome',
            'cpf'       => 'CPF',
            'birthday'  => 'Data Nascimento',
        ];

        $this->validate($request, $rules, $messages, $nicenames);

        $data = $request->request->all();

        $client = Client::create($data);
        
        if($client)
        {
            return redirect()->route('simulation_create', $client->id);
        }
        //flash('Coeficiente adicionado com sucesso.')->success()->important();
    }
}
