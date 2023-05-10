<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\TipoCompra;
use App\Models\Proveedore;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Compra\StoreRequest;
use App\Http\Requests\Compra\UpdateRequest;
use App\Models\Conversione;
use App\Models\ConversionesMenore;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    //TODO: Restringir el acceso a las compras
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $compras = Compra::all();
        $tipoCompras = TipoCompra::withTrashed()->get();
        return view('compra.index', compact('compras', 'tipoCompras'));
    }


    public function create()
    {
        $compra = new Compra();
        $tipoCompra = TipoCompra::pluck('nombre', 'id');
        $proveedore = Proveedore::pluck('nombre', 'id');
        $producto = Producto::where('status', 'ACTIVE')->pluck('nombre', 'id');
        $conversionesMenores =  ConversionesMenore::where('status', 'ACTIVE')->pluck('nombre', 'id');
        $user = User::pluck('name', 'id');
        return view('compra.create', compact('compra', 'tipoCompra', 'proveedore', 'user', 'producto', 'conversionesMenores'));
    }


    public function store(StoreRequest $request)
    {
        $compra = Compra::create($request->except(['_token', 'producto_id', 'producto', 'cantidad', 'precio', 'conversion_menor_id',]) + [
            'fecha_compra' => Carbon::now('America/Guatemala'),
            'usuario_id' => Auth::user()->id,
        ]);
        foreach ($request->producto_id as $key => $producto) {
            $resultados[] = array('producto_id' => $request->producto_id[$key], 'cantidad' => $request->cantidad[$key], 'precio' => $request->precio[$key], 'conversion_menor_id' => $request->conversion_menor_id[$key]);
        }
        $compra->detalleCompras()->createMany($resultados);
        return redirect()->route('com.index')
            ->with('success', 'Compra Almacenada con Éxito');
    }


    public function show($id)
    {
        $compra = Compra::find($id);

        $detalleCompras = $compra->detalleCompras;
        $subtotal = 0;
        foreach ($detalleCompras as $detalle) {
            $subtotal += $detalle->cantidad * $detalle->precio;
        }
        $tipoCompra = TipoCompra::pluck('nombre', 'id');
        $proveedores = Proveedore::pluck('nombre', 'id');
        $users = User::pluck('name', 'id');
        $conversionesMenores =  ConversionesMenore::pluck('nombre', 'id');
        return view('compra.show', compact('compra', 'tipoCompra', 'proveedores', 'users', 'detalleCompras', 'subtotal', 'conversionesMenores'));
    }


    public function edit($id)
    {
    }


    public function update(UpdateRequest $request, Compra $compra, $id)
    {
    }

    public function archive()
    {
    }

    public function destroy($id)
    {
    }

    public function restore($id)
    {
    }


    public function pdfDetalle($id)
    {
        $compra = Compra::find($id);

        $detalleCompras = $compra->detalleCompras;
        $subtotal = 0;
        foreach ($detalleCompras as $detalle) {
            $subtotal += $detalle->cantidad * $detalle->precio;
        }

        $tipoCompra = TipoCompra::pluck('nombre', 'id');
        $proveedores = Proveedore::get();
        $users = User::pluck('name', 'id');
        $conversionesMenores =  ConversionesMenore::pluck('nombre', 'id');

        $pdf = PDF::loadView('compra.pdfDetalle', compact('compra', 'tipoCompra', 'proveedores', 'users', 'detalleCompras', 'subtotal', 'conversionesMenores'));
        return $pdf->download('Reporte_de_Compra_No_' . $compra->id . '.pdf');
    }

    public function cambiar_estado($id)
    {
        $compra = Compra::find($id);

        if ($compra->status == 'VALID') {
            $compra->update(['status' => 'CANCELED']);
            return redirect()->back();
        } else {
            $compra->update(['status' => 'VALID']);
            return redirect()->back();
        }
    }
}
