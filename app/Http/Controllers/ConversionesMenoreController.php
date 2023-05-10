<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConversionesMenore\StoreRequest;
use App\Http\Requests\ConversionesMenore\UpdateRequest;
use App\Models\Conversione;
use App\Models\ConversionesMenore;
use Illuminate\Http\Request;

class ConversionesMenoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $conversionesMenor = new ConversionesMenore();
        $conversione =  Conversione::pluck('nombre', 'id');
        return view('conversionMenor.create', compact('conversionesMenor', 'conversione'));
    }


    public function store(StoreRequest $request)
    {
        ConversionesMenore::create($request->except(['_token']));
        return redirect()->route('con.index')
            ->with('success', 'Unidad de Medida Menor Almacenada con Éxito');
    }


    public function show($id)
    {
        $conversionesMenor = ConversionesMenore::find($id);
        $conversiones =  Conversione::pluck('nombre', 'id');
        return view('conversionMenor.show', compact('conversionesMenor', 'conversiones'));
    }


    public function edit($id)
    {
        $conversionesMenor = ConversionesMenore::find($id);
        $conversione =  Conversione::pluck('nombre', 'id');
        return view('conversionMenor.edit', compact('conversionesMenor', 'conversione'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $conversionesMenor = $request->except(['_token', '_method']);
        ConversionesMenore::where('id', '=', $id)->update($conversionesMenor);
        return redirect()->route('con.index')
            ->with('success', 'Unidad de Medida Menor Actualizada con Éxito');
    }

    public function cambiar_estado($id)
    {
        $conversione = ConversionesMenore::find($id);

        if ($conversione->status == 'ACTIVE') {
            $conversione->update(['status' => 'DEACTIVATED']);
            return redirect()->back();
        } else {
            $conversione->update(['status' => 'ACTIVE']);
            return redirect()->back();
        }
    }
}
