<?php

namespace App\Http\Controllers;

use App\Models\Coefficient;
use Illuminate\Http\Request;

class CoefficientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coefficients = Coefficient::orderBy('data')->paginate();
        return view('dashboard.coefficients.index', compact('coefficients'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coefficient = Coefficient::findOrFail($id);

        return view('dashboard.coefficients.show', compact('coefficient'));
    }
}
