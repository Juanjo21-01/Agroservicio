<?php

namespace App\Http\Controllers;

use App\Http\Requests\Telefono\StoreRequest;
use App\Http\Requests\Telefono\UpdateRequest;
use App\Models\Telefono;
use App\Models\Proveedore;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    //TODO: Restringir el acceso a los telefonos
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $telefonos = Telefono::all();
        $proveedores = Proveedore::withTrashed()->get();
        return view('telefono.index', compact('telefonos', 'proveedores'));
    }

    public function create()
    {
        $telefono = new Telefono();
        $proveedores = Proveedore::pluck('nombre', 'id');

        return view('telefono.create', compact('telefono', 'proveedores'));
    }


    public function store(StoreRequest $request)
    {

        Telefono::create($request->except(['_token']));

        return redirect()->route('tel.index')
            ->with('success', 'Número de Teléfono Almacenado con Éxito');
    }


    public function show($id)
    {
        $telefono = Telefono::find($id);
        $proveedores = Proveedore::pluck('nombre', 'id');
        return view('telefono.show', compact('telefono', 'proveedores'));
    }


    public function edit($id)
    {
        $telefono = Telefono::find($id);
        $proveedores = Proveedore::pluck('nombre', 'id');
        return view('telefono.edit', compact('telefono', 'proveedores'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $telefono = $request->except(['_token', '_method']);
        Telefono::where('id', '=', $id)->update($telefono);
        return redirect()->route('tel.index')
            ->with('success', 'Número de Teléfono Actualizado con Éxito');
    }

    public function archive()
    {
        $telefonos = Telefono::onlyTrashed()->get();
        $proveedores = Proveedore::withTrashed()->get();
        return view('telefono.archive', compact('telefonos', 'proveedores'));
    }

    public function destroy($id)
    {
        $telefono = Telefono::withTrashed()->find($id);
        $telefono->delete();

        return redirect()->route('tel.index')
            ->with('success', 'Número de Teléfono Deshabilitado Correctamente');
    }

    public function restore($id)
    {
        $telefono = Telefono::onlyTrashed()->find($id);

        $telefono->restore();

        return redirect()->route('tel.index')
            ->with('success', 'Número de Teléfono Habilitado Correctamente');;
    }
}
