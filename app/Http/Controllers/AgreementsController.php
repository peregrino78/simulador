<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\AgreementParticularitie;
use Illuminate\Http\Request;

class AgreementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agreements = Agreement::orderBy('name')->paginate();
        return view('dashboard.agreements.index', compact('agreements'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agreement = Agreement::findOrFail($id);

        return view('dashboard.agreements.show', compact('agreement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.agreements.create');
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
            'name'          => 'required | unique:Agreements',
            'description'   => 'required',
            'age_limit'     => 'required',
            'parcel_limit'  => 'required'
        ];

        $messages = [
            'name.unique' => 'Este nome já está cadastrado!'
        ];

        $nicenames = [
            'name'          => 'Nome',
            'description'   => 'Descrição',
            'age_limit'     => 'Limite de Idade',
            'parcel_limit'  => 'Limite de Parcelas'
        ];

        $this->validate($request, $rules, $messages, $nicenames);

        $data = $request->request->all();

        $agreement = Agreement::create($data);

        if($agreement)
        {
            \App\Models\AgreementParticularitie::create([
                'agreement_id' => $agreement->id,
                'description'   => $data['description'],
                'age_limit'     => $data['age_limit'],
                'parcel_limit'  => $data['parcel_limit']
            ]);
        }

        flash('Convênio adicionado com sucesso.')->success()->important();

        return redirect()->route('convenio.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agreement = Agreement::findOrFail($id);
        return view('dashboard.agreements.edit', compact('agreement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agreement = Agreement::findOrFail($id);

        $rules = [];

        if($agreement->name != $request->name)
        {
            $rules += [
                'name'  => 'required | unique:Agreements'
            ];
        }

        $rules += [
            'description'   => 'required',
            'age_limit'     => 'required',
            'parcel_limit'  => 'required'
        ];

        $messages = [
            'name.unique' => 'Este nome já está cadastrado!'
        ];

        $nicenames = [
            'name'          => 'Nome',
            'description'   => 'Descrição',
            'age_limit'     => 'Limite de Idade',
            'parcel_limit'  => 'Limite de Parcelas'
        ];

        $this->validate($request, $rules, $messages, $nicenames);

        $data = $request->request->all();

        $agreement->update($data);

        $agreementParticularities = AgreementParticularitie::where('agreement_id', $agreement->id)->first();

        $agreementParticularities->update($data);

        flash('Convênio atualizado com sucesso.')->success()->important();

        return redirect()->route('convenio.index');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $agreement = Agreement::findOrFail($id);

            $agreement->particularities()->delete();

            $agreement->delete();

            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Convênio removido com sucesso!'
            ]);
        } catch(Exception $e) {
            return response()->json([
                'code' => 501,
                'message' => $e->getMessage()
            ]);
        }
    }
}
