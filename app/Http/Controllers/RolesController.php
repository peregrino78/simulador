<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Auth;
use App\User;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('dashboard.configuracoes.roles.index', compact('roles'));
    }

    public function permissoes($id)
    {
        $user = Auth::user();
        $role = Role::findOrFail($id);
        $permissoes = Permission::all();

        $resultados = [];

        foreach ($permissoes as $key => $permissao) {
          $resultados[$permissao->model][] = $permissao;
        }

        return view('dashboard.configuracoes.roles.permissoes.index', compact('user', 'role', 'resultados'));
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

    public function permissoesStore(Request $request)
    {
        $data = $request->request->all();

        $permissoes = $data['permissoes'];
        $role = $data['role'];

        if(count($permissoes) > 0) {
            $role = Role::findOrFail($role);
            $role->detachAllPermissions();
            $role->syncPermissions($permissoes);
        }

        return redirect()->back()->with('success', 'Permissões atualizadas com sucesso!');
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
