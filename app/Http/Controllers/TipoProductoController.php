<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;
use App\Http\Requests\TipoProducto\StoreRequest;
use App\Http\Requests\TipoProducto\UpdateRequest;

class TipoProductoController extends Controller
{
    //TODO: Restringir el acceso a los tipo productos
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $tipoProductos = TipoProducto::all();
        return view('tipo-producto.index', compact('tipoProductos'));
    }


    public function create()
    {
        $tipoProducto = new TipoProducto();
        return view('tipo-producto.create', compact('tipoProducto'));
    }


    public function store(StoreRequest $request)
    {
        TipoProducto::create($request->except(['_token']));
        return redirect()->route('tprod.index')
            ->with('success', 'Tipo Producto Almacenado con Éxito.');
    }


    public function show($id)
    {
        $tipoProducto = TipoProducto::find($id);
        return view('tipo-producto.show', compact('tipoProducto'));
    }


    public function edit($id)
    {
        $tipoProducto = TipoProducto::find($id);
        return view('tipo-producto.edit', compact('tipoProducto'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $tipoProducto = $request->except(['_token', '_method']);
        TipoProducto::where('id', '=', $id)->update($tipoProducto);
        return redirect()->route('tprod.index')
            ->with('success', 'Tipo Producto Actualizado con Éxito.');
    }


    public function archive()
    {
        $tipoProductos = TipoProducto::onlyTrashed()->get();
        return view('tipo-producto.archive', compact('tipoProductos'));
    }


    public function destroy($id)
    {
        $tipoProducto = TipoProducto::withTrashed()->find($id);

        $tipoProducto->delete();

        return redirect()->route('tprod.index')
            ->with('success', 'Tipo Producto Deshabilitado Correctamente.');
    }


    public function restore($id)
    {
        $tipoProducto = TipoProducto::onlyTrashed()->find($id);

        $tipoProducto->restore();

        return redirect()->route('tprod.index')
            ->with('success', 'Tipo Producto Habilitado Correctamente.');;
    }
}
