<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //TODO: Restringir el acceso al tipo de venta
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = User::all();
        $tipoUsuarios = TipoUsuario::all();
        return view('user.index', compact('usuarios', 'tipoUsuarios'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $tipoUsuario)
    {
        //
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
    }

    public function archive()
    {
        $usuarios = User::onlyTrashed()->get();
        $tipoUsuarios = TipoUsuario::get();
        return view('user.archive', compact('usuarios', 'tipoUsuarios'));
    }
    public function destroy($id)
    {
        $usuario = User::withTrashed()->find($id);

        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario Deshabilitado Correctamente.');
    }

    public function restore($id)
    {
        $usuario = User::onlyTrashed()->find($id);

        $usuario->restore();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario Habilitado Correctamente.');;
    }
}
