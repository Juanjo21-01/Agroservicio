<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoCompra\StoreRequest;
use App\Http\Requests\TipoCompra\UpdateRequest;
use App\Models\TipoCompra;
use Illuminate\Http\Request;

class TipoCompraController extends Controller
{
    //TODO: Restringir el acceso a los tipo compras
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tipoCompras = TipoCompra::all();
        return view('tipo-compra.index', compact('tipoCompras'));
    }


    public function create()
    {
        $tipoCompra = new TipoCompra();
        return view('tipo-compra.create', compact('tipoCompra'));
    }


    public function store(StoreRequest $request)
    {
        TipoCompra::create($request->except(['_token']));
        return redirect()->route('tcom.index')
            ->with('success', 'Tipo Compra Almacenado con Éxito');
    }


    public function show($id)
    {
        $tipoCompra = TipoCompra::find($id);
        return view('tipo-compra.show', compact('tipoCompra'));
    }


    public function edit($id)
    {
        $tipoCompra = TipoCompra::find($id);
        return view('tipo-compra.edit', compact('tipoCompra'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $tipoCompra = $request->except(['_token', '_method']);
        TipoCompra::where('id', '=', $id)->update($tipoCompra);
        return redirect()->route('tcom.index')
            ->with('success', 'Tipo Compra Actualizado con Éxito');
    }


    public function archive()
    {
        $tipoCompras = TipoCompra::onlyTrashed()->get();
        return view('tipo-compra.archive', compact('tipoCompras'));
    }


    public function destroy($id)
    {
        $tipoCompra = TipoCompra::withTrashed()->find($id);

        $tipoCompra->delete();

        return redirect()->route('tcom.index')
            ->with('success', 'Tipo Compra Deshabilitado Correctamente');
    }


    public function restore($id)
    {
        $tipoCompra = TipoCompra::onlyTrashed()->find($id);

        $tipoCompra->restore();

        return redirect()->route('tcom.index')
            ->with('success', 'Tipo Compra Habilitado Correctamente');;
    }
}
