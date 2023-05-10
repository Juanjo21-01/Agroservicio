<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Proveedore\StoreRequest;
use App\Http\Requests\Proveedore\UpdateRequest;

class ProveedoreController extends Controller
{
    //TODO: Restringir el acceso a los proveedores
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $proveedores = Proveedore::all();
        return view('proveedore.index', compact('proveedores'));
    }


    public function create()
    {
        $proveedore = new Proveedore();
        return view('proveedore.create', compact('proveedore'));
    }


    public function store(StoreRequest $request)
    {
        Proveedore::create($request->except(['_token']));
        return redirect()->route('prov.index')
            ->with('success', 'Proveedor Almacenado con Éxito');
    }


    public function show($id)
    {
        $proveedore = Proveedore::find($id);
        return view('proveedore.show', compact('proveedore'));
    }


    public function edit($id)
    {
        $proveedore = Proveedore::find($id);
        return view('proveedore.edit', compact('proveedore'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $proveedore = $request->except(['_token', '_method']);
        Proveedore::where('id', '=', $id)->update($proveedore);
        return redirect()->route('prov.index')
            ->with('success', 'Proveedor Actualizado con Éxito');
    }


    public function archive()
    {
        $proveedores = Proveedore::onlyTrashed()->get();
        return view('proveedore.archive', compact('proveedores'));
    }


    public function destroy($id)
    {
        $proveedore = Proveedore::withTrashed()->find($id);

        $proveedore->delete();

        return redirect()->route('prov.index')
            ->with('success', 'Proveedor Deshabilitado Correctamente');
    }


    public function restore($id)
    {
        $proveedore = Proveedore::onlyTrashed()->find($id);

        $proveedore->restore();

        return redirect()->route('prov.index')
            ->with('success', 'Proveedor Habilitado Correctamente');;
    }
}
