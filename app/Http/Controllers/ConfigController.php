<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Config\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = Config::all();
        $grupos = Group::all();
        return view('dashboard.configs.index', compact('configs','grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.configs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->request->all();

      $validator = Validator::make($data, [
          'name' => 'required|string|max:255|unique:configs',
      ]);

      if($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      }

      if($data['type_id'] == 2) {
            $data['value'] = !empty($data['value']) ? (boolean)$data['value'] : false;
      } elseif($data['type_id'] == 3) {
          if ($request->hasFile('value') && $request->file('value')->isValid()) {
              $data['value'] = $request->value->store('configs');
          }
      }

      $data['active'] = !empty($data['active']) ? (boolean)$data['active'] : false;

      $data['slug'] = str_slug($data['name']);

      $config = Config::create($data);

      flash('A Configuração foi adicionada com sucesso!')->success()->important();

      return redirect()->route('configs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::findOrFail($id);

        return view('dashboard.configs.edit', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->request->all();

        $config = Config::findOrFail($id);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255|unique:configs,name,'.$config->id,
        ]);

        if($validator->fails()) {
          return back()->withErrors($validator)->withInput();
        }

        if($config->tipo->id == 2) {
              $data['value'] = !empty($data['value']) ? (boolean)$data['value'] : false;
        } elseif($config->tipo->id == 3) {

            if(Storage::exists($config->value)) {
                Storage::delete($config->value);
            }

            if ($request->hasFile('value') && $request->file('value')->isValid()) {
                $data['value'] = $request->value->store('configs');
            }
        }

        $data['active'] = !empty($data['active']) ? (boolean)$data['active'] : false;

        $config->update($data);

        session()->forget($config->slug);
        session()->forget($config->slug.'data');

        flash('A Configuração foi atualizada com sucesso!')->success()->important();

        return redirect()->route('configs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        //
    }
}
