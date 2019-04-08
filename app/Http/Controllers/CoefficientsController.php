<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Coefficient;
use Illuminate\Http\Request;
use App\Models\OperationType;

class CoefficientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coefficients = Coefficient::orderBy('date')->paginate();
        return view('dashboard.coefficients.index', compact('coefficients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agreements = Agreement::pluck('name', 'id');
        $operations = OperationType::pluck('name', 'id');
        return view('dashboard.coefficients.create', compact('agreements', 'operations'));
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
            'term'              => 'required',
            'rate'              => 'required',
            'factor'            => 'required',
            'date'              => 'required',
            'agreement_id'      => 'required',
            'operation_type_id' => 'required'
        ];

        $nicenames = [
            'term'              => 'Prazo',
            'rate'              => 'Taxa',
            'factor'            => 'Fator',
            'date'              => 'Data',
            'agreement_id'      => 'Convênio',
            'operation_type_id' => 'Operação'
        ];

        $this->validate($request, $rules, [], $nicenames);

        $data = $request->request->all();

        Coefficient::create($data);

        flash('Coeficiente adicionado com sucesso.')->success()->important();

        return redirect()->route('coeficientes.index');
    }
}
