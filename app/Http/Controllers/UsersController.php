<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;
use App\User;
use Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::all();
         return view('dashboard.usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.usuarios.create',compact('roles'));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $data['avatar'] = $request->avatar->store('usuarios');
        }

        if(!empty($data['password'])) {
            $data['password'] = \Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $data['active'] = (boolean)$request->has('active');

        $user = User::create($data);

        $user->attachRole($data['role']);

        $user->save();

        return redirect()->route('users.index');
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
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('dashboard.usuarios.edit',compact('roles','user'));
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
        $data = $request->request->all();

        $user = User::findOrFail($id);

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,name,'.$user->id,
        ]);

        if($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
        }

        if(!empty($data['password'])) {
            $data['password'] = \Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {

            if(Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            $data['avatar'] = $request->avatar->store('usuarios');
        }

        $data['active'] = (boolean)$request->has('active');

        $user->update($data);

        $role = Role::findOrFail($data['role']);

        if($role->level <= $user->level()) {
            $user->syncRoles($data['role']);
        }

        $user->save();

        return redirect()->route('users.index');
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

    public function avatar(Request $request)
    {
        $link = "";

        if($request->has('user')) {
            $user = \App\User::findOrFail($request->get('user'));
            $link = $user->avatar;
        }
        else {
          $user = \Auth::user();
          $link = $user->avatar;
        }

        if($link)
        {
            $file = \Storage::disk('local')->get($link);
        } else {
            $file = \Storage::disk('local')->get('/public/avatar/default.png');
        }

        return response($file, 200)->header('Content-Type', 'image/jpeg');
    }
}
