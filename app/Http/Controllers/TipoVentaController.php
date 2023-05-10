<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoVenta\StoreRequest;
use App\Http\Requests\TipoVenta\UpdateRequest;
use App\Models\TipoVenta;
use Illuminate\Http\Request;

class TipoVentaController extends Controller
{
    //TODO: Restringir el acceso al tipo de venta
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $tipoVentas = TipoVenta::all();
        return view('tipo-venta.index', compact('tipoVentas'));
    }


    public function create()
    {
        $tipoVenta = new TipoVenta();
        return view('tipo-venta.create', compact('tipoVenta'));
    }


    public function store(StoreRequest $request)
    {
        TipoVenta::create($request->except(['_token']));
        return redirect()->route('tpven.index')
            ->with('success', 'Tipo Venta Almacenado con Éxito.');
    }


    public function show($id)
    {
        $tipoVenta = TipoVenta::find($id);
        return view('tipo-venta.show', compact('tipoVenta'));
    }


    public function edit($id)
    {
        $tipoVenta = TipoVenta::find($id);
        return view('tipo-venta.edit', compact('tipoVenta'));
    }


    public function update(UpdateRequest $request,  $id)
    {
        $tipoVenta = $request->except(['_token', '_method']);
        TipoVenta::where('id', '=', $id)->update($tipoVenta);
        return redirect()->route('tpven.index')
            ->with('success', 'Tipo Venta Actualizado con Éxito.');
    }


    public function archive()
    {
        $tipoVentas = TipoVenta::onlyTrashed()->get();
        return view('tipo-venta.archive', compact('tipoVentas'));
    }


    public function destroy($id)
    {
        $tipoVenta = TipoVenta::withTrashed()->find($id);

        if (($tipoVenta->trashed())) {
            $tipoVenta->forceDelete();

            return redirect()->route('tpven.archive')
                ->with('success', 'Tipo Venta Borrado de la Base de Datos.');
        }
        $tipoVenta->delete();

        return redirect()->route('tpven.index')
            ->with('success', 'Tipo Venta Deshabilitado Correctamente.');
    }


    public function restore($id)
    {
        $tipoVenta = TipoVenta::onlyTrashed()->find($id);

        $tipoVenta->restore();

        return redirect()->route('tpven.index')
            ->with('success', 'Tipo Venta Habilitado Correctamente.');;
    }
}
