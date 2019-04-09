<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Client;
use App\Models\Network;
use App\Models\Payment;
use App\Models\Enrollment;
use App\Models\Coefficient;
use Illuminate\Http\Request;
use App\Models\Formulario\ContactsForm;
use App\Models\Formulario\NewslettersForm;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
    /*

        if(Auth::user()->id_perfil_usuario == 1)
        {
            // Se usuário for Administrador, busca quantidade de simulações geral
            $simulacoes = ResultadoSimulacao::get();
            $simulacoes = count($simulacoes);
            $simulacoesAprovadas = ResultadoSimulacao::where('resultado','=','aprovada')->count();
            $simulacoesReprovadas = ResultadoSimulacao::where('resultado','=','reprovada')->count();
        }
        else
        {
            $idUser = Auth::user()->id;
            // Se não busca quantidade de simulações por usuário
            $simulacoes = ResultadoSimulacao::where('id_usuario', $idUser)->count();
            $simulacoesAprovadas = ResultadoSimulacao::where('resultado','=','aprovada')->where('id_usuario', $idUser)->count();
            $simulacoesReprovadas = ResultadoSimulacao::where('resultado','=','reprovada')->where('id_usuario', $idUser)->count();
        }
    */
        $clients = Client::count();
        $coefficients = Coefficient::orderBy('updated_at', 'DESC')->first();

        return view('dashboard.index', compact('clients', 'coefficients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
