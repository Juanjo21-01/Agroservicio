<?php

namespace App\Http\Controllers;

use App\Models\Conversione;
use App\Http\Requests\Conversione\StoreRequest;
use App\Http\Requests\Conversione\UpdateRequest;
use App\Models\ConversionesMenore;
use Illuminate\Http\Request;

class ConversioneController extends Controller
{
    //TODO: Restringir el acceso a las conversiones
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $conversiones = Conversione::all();
        $conversionesMenores = ConversionesMenore::all();
        return view('conversion.index', compact('conversiones', 'conversionesMenores'));
    }


    public function create()
    {
        $conversione = new Conversione();
        return view('conversion.create', compact('conversione'));
    }


    public function store(StoreRequest $request)
    {
        Conversione::create($request->except(['_token']));
        return redirect()->route('con.index')
            ->with('success', 'Unidad de Medida Almacenada con Éxito');
    }


    public function show($id)
    {
        $conversione = Conversione::find($id);
        return view('conversion.show', compact('conversione'));
    }


    public function edit($id)
    {
        $conversione = Conversione::find($id);
        return view('conversion.edit', compact('conversione'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $conversione = $request->except(['_token', '_method']);
        Conversione::where('id', '=', $id)->update($conversione);
        return redirect()->route('con.index')
            ->with('success', 'Unidad de Medida Actualizada con Éxito');
    }


    public function archive()
    {
        $conversiones = Conversione::onlyTrashed()->get();
        return view('conversion.archive', compact('conversiones'));
    }


    public function destroy($id)
    {
        $conversione = Conversione::withTrashed()->find($id);

        $conversione->delete();

        return redirect()->route('con.index')
            ->with('success', 'Unidad de Medida Deshabilitada Correctamente');
    }

    public function restore($id)
    {
        $conversione = Conversione::onlyTrashed()->find($id);

        $conversione->restore();

        return redirect()->route('con.index')
            ->with('success', 'Unidad de Medida Habilitada Correctamente');;
    }
}
