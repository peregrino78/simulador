<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Coefficient;
use Illuminate\Http\Request;
use App\Models\OperationType;
use DB;

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coefficient = Coefficient::findOrFail($id);

        $agreements = Agreement::pluck('name', 'id');
        $operations = OperationType::pluck('name', 'id');

        return view('dashboard.coefficients.edit', compact('coefficient', 'agreements', 'operations'));
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
        $coefficient = Coefficient::findOrFail($id);

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

        $coefficient->update($data);

        flash('Coeficiente atualizado com sucesso.')->success()->important();

        return redirect()->route('coeficientes.index');
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
            $coefficient = Coefficient::findOrFail($id);

            $coefficient->delete();

            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Coeficiente removido com sucesso!'
            ]);
        } catch(Exception $e) {
            return response()->json([
                'code' => 501,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for deleting all resource selecteds.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        try {
            $ids = $request->ids;
            Coefficient::whereIn('id', explode(",",$ids))->delete();

            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Coeficientes removidos com sucesso!'
            ]);
        } catch(Exception $e) {
            return response()->json([
                'code' => 501,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getByDate()
    {
        // busca a taxa de acordo com a data mais próxima passando a data atual
        return $coefficients = Coefficient::where('term', $contractTerm)
        ->where('agreement_id', $agreement)
        ->where('operation_type_id', $operation)
        ->orderBy(DB::raw('ABS(DATEDIFF(coefficients.date, NOW()))'))
        ->first();
    }
}
