<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoCliente;
use Illuminate\Http\Request;
use App\Http\Requests\Cliente\StoreRequest;
use App\Http\Requests\Cliente\UpdateRequest;
use App\Models\TipoCompra;

class ClienteController extends Controller
{
    //TODO: Restringir el acceso a los clientes
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Cliente::all();
        $tipoClientes = TipoCliente::withTrashed()->get();
        return view('cliente.index', compact('clientes', 'tipoClientes'));
    }


    public function create()
    {
        $cliente = new Cliente();
        $tipoCliente = TipoCliente::pluck('nombre', 'id');
        return view('cliente.create', compact('cliente', 'tipoCliente'));
    }


    public function store(StoreRequest $request)
    {
        Cliente::create($request->except(['_token']));
        return redirect()->route('cl.index')
            ->with('success', 'Cliente Almacenado con Éxito');
    }



    public function show($id)
    {
        $cliente = Cliente::find($id);
        $tipoCliente = TipoCliente::pluck('nombre', 'id');
        return view('cliente.show', compact('cliente', 'tipoCliente'));
    }


    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $tipoCliente = TipoCliente::pluck('nombre', 'id');

        return view('cliente.edit', compact('cliente', 'tipoCliente'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $cliente = $request->except(['_token', '_method']);
        Cliente::where('id', '=', $id)->update($cliente);
        return redirect()->route('cl.index')
            ->with('success', 'Cliente Actualizado con Éxito');
    }

    public function archive()
    {
        $clientes = Cliente::onlyTrashed()->get();
        $tipoClientes = TipoCliente::withTrashed()->get();
        return view('cliente.archive', compact('clientes', 'tipoClientes'));
    }

    public function destroy($id)
    {
        $cliente = Cliente::withTrashed()->find($id);

        $cliente->delete();

        return redirect()->route('cl.index')
            ->with('success', 'Cliente Deshabilitado Correctamente');
    }

    public function restore($id)
    {
        $cliente = Cliente::onlyTrashed()->find($id);

        $cliente->restore();

        return redirect()->route('cl.index')
            ->with('success', 'Cliente Habilitado Correctamente');;
    }
}
