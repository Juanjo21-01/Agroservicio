<?php

namespace App\Http\Controllers\Auth;

use App\Models\TipoUsuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ControllerLogin extends Controller
{
    //TODO: Abrir la vista 
    public function index()
    {
        return view('auth.login');
    }

    //TODO: Crear un nuevo registro en la tabla
    public function create()
    {
        //
    }

    //TODO: Almacenar el nuevo registro en la tabla de la base de datos
    public function store(Request $request)
    {
        // Traer el tipo de usuario
        $tipoUsuario = 0;
        if ($request->tipo == 'administrador') {
            $tipoUsuario = 1;
        } else if ($request->tipo == 'propietario') {
            $tipoUsuario = 2;
        } else if ($request->tipo == 'empleado') {
            $tipoUsuario = 3;
        } else {
            $tipoUsuario = 0;
        }

        // Validar la peticion
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        $credentials += ['tipo_usuarios_id' => $tipoUsuario];

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'name' => 'Usuario Incorrecto',
                'password' => 'Contraseña Incorrecta',
                'tipo' => 'Eliga un tipo de usuario',
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended();
    }

    //TODO: Mostrar todos los registros de las tablas de la base de datos
    public function show($id)
    {
        //
    }

    //TODO: Editar un registro de la tabla
    public function edit($id)
    {
        //
    }

    //TODO: Almacenar el registro editado en la tabla de la base de datos
    public function update(Request $request, $id)
    {
        //
    }

    //TODO: Cerrar sesion de la aplicacion
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login.index')->with('status', 'Sesion Cerrada Correctamente!');
    }
}
