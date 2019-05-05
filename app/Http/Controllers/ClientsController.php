<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('name')->paginate();
        return view('dashboard.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::selectRaw("CONCAT (initials, ' - ', name) as names, id")->pluck('names', 'id');
        $cities = City::pluck('name', 'id');

        return view('dashboard.clients.create', compact('states', 'cities'));
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
