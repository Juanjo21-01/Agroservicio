<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerRegistrar extends Controller
{
    //TODO: Restringir el acceso al registro de usuarios
    public function __construct()
    {
       // $this->middleware('auth');
    }
    //TODO: Abrir la vista 
    public function index()
    {
        return view('auth.registrar');
    }

    //TODO: Crear un nuevo registro en la tabla
    public function create()
    {
        //
    }

    //TODO: Almacenar el nuevo registro en la tabla de la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo' => ['required']
        ]);

        // TODO: Guardar el tipo de usuario
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

        //TODO: Guardar en la base de datos
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tipo_usuarios_id' => $tipoUsuario,
        ]);

        //Redireccionar al usuario
        //Auth::login($usuario);
        return to_route('login.index')->with('status', 'Cuenta Creada!');
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

    //TODO: Eliminar un registro de la tabla de la base de datos
    public function destroy($id)
    {
        //
    }
}
