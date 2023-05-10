<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoCliente\StoreRequest;
use App\Http\Requests\TipoCliente\UpdateRequest;
use App\Models\TipoCliente;
use Illuminate\Http\Request;

class TipoClienteController extends Controller
{
    //TODO: Restringir el acceso a los tipo clientes
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $tipoClientes = TipoCliente::all();
        return view('tipo-cliente.index', compact('tipoClientes'));
    }


    public function create()
    {
        $tipoCliente = new TipoCliente();
        return view('tipo-cliente.create', compact('tipoCliente'));
    }


    public function store(StoreRequest $request)
    {
        TipoCliente::create($request->except(['_token']));
        return redirect()->route('tpcl.index')
            ->with('success', 'Tipo Cliente Almacenado con Éxito');
    }


    public function show($id)
    {
        $tipoCliente = TipoCliente::find($id);
        return view('tipo-cliente.show', compact('tipoCliente'));
    }


    public function edit($id)
    {
        $tipoCliente = TipoCliente::find($id);
        return view('tipo-cliente.edit', compact('tipoCliente'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $tipoCliente = $request->except(['_token', '_method']);
        TipoCliente::where('id', '=', $id)->update($tipoCliente);
        return redirect()->route('tpcl.index')
            ->with('success', 'Tipo Cliente Actualizado con Éxito');
    }


    public function archive()
    {
        $tipoClientes = TipoCliente::onlyTrashed()->get();
        return view('tipo-cliente.archive', compact('tipoClientes'));
    }

    public function destroy($id)
    {
        $tipoCliente = TipoCliente::withTrashed()->find($id);

        $tipoCliente->delete();

        return redirect()->route('tpcl.index')
            ->with('success', 'Tipo Cliente Deshabilitado Correctamente');
    }

    public function restore($id)
    {
        $tipoCliente = TipoCliente::onlyTrashed()->find($id);

        $tipoCliente->restore();

        return redirect()->route('tpcl.index')
            ->with('success', 'Tipo Cliente Habilitado Correctamente');;
    }
}
