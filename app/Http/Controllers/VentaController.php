<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoVenta;
use App\Models\Venta;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Venta\StoreRequest;
use App\Http\Requests\Venta\UpdateRequest;
use App\Models\ConversionesMenore;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    //TODO: Restringir el acceso a las ventas
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $ventas = Venta::all();
        $tipoVentas = TipoVenta::withTrashed()->get();

        return view('venta.index', compact('ventas', 'tipoVentas'));
    }


    public function create()
    {
        $venta = new Venta();
        $tipoVenta = TipoVenta::pluck('nombre', 'id');
        $cliente = Cliente::pluck('nombre', 'id');
        $producto = Producto::where('status', 'ACTIVE')->get();
        $conversionesMenores = ConversionesMenore::where('status', 'ACTIVE')->pluck('nombre', 'id');
        $user = User::pluck('name', 'id');
        return view('venta.create', compact('venta', 'tipoVenta', 'cliente', 'user', 'producto', 'conversionesMenores'));
    }


    public function store(StoreRequest $request)
    {
        // dd($request);
        $venta = Venta::create($request->except(['_token', 'producto_id', 'producto', 'cantidad', 'precio', 'descuento', 'conversion_menor_id']) + [
            'fecha_venta' => Carbon::now('America/Guatemala'),
            'usuario_id' => Auth::user()->id,
        ]);
        foreach ($request->producto_id as $key => $producto) {
            $resultados[] = array('producto_id' => $request->producto_id[$key], 'cantidad' => $request->cantidad[$key], 'precio' => $request->precio[$key], 'descuento' => $request->descuento[$key], 'conversion_menor_id' => $request->conversion_menor_id[$key]);
        }
        $venta->detalleVentas()->createMany($resultados);
        return redirect()->route('ven.index')
            ->with('success', 'Venta Almacenada con Éxito');
    }


    public function show($id)
    {
        $venta = Venta::find($id);

        $detalleVentas = $venta->detalleVentas;
        $subtotal = 0;
        foreach ($detalleVentas as $detalle) {
            $subtotal += $detalle->cantidad * $detalle->precio - ($detalle->cantidad * $detalle->precio * ($detalle->descuento / 100));
        }
        $tipoVenta = TipoVenta::pluck('nombre', 'id');
        $cliente = Cliente::pluck('nombre', 'id');
        $users = User::pluck('name', 'id');
        $conversionesMenores =  ConversionesMenore::pluck('nombre', 'id');
        return view('venta.show', compact('venta', 'tipoVenta', 'cliente', 'users', 'detalleVentas', 'subtotal', 'conversionesMenores'));
    }


    public function edit($id)
    {
    }


    public function update(UpdateRequest $request, Venta $venta, $id)
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
        $venta = Venta::find($id);

        $detalleVentas = $venta->detalleVentas;
        $subtotal = 0;
        foreach ($detalleVentas as $detalle) {
            $subtotal += $detalle->cantidad * $detalle->precio - ($detalle->cantidad * $detalle->precio * ($detalle->descuento / 100));
        }

        $tipoVenta = TipoVenta::pluck('nombre', 'id');
        $clientes = Cliente::pluck('nombre', 'id');
        $users = User::pluck('name', 'id');
        $conversionesMenores =  ConversionesMenore::pluck('nombre', 'id');

        $pdf = PDF::loadView('venta.pdfDetalle', compact('venta', 'tipoVenta', 'clientes', 'users', 'detalleVentas', 'subtotal', 'conversionesMenores'));
        return $pdf->download('Reporte_de_Compra_No_' . $venta->id . '.pdf');
    }

    public function cambiar_estado($id)
    {
        $venta = Venta::find($id);

        if ($venta->status == 'VALID') {
            $venta->update(['status' => 'CANCELED']);
            return redirect()->back();
        } else {
            $venta->update(['status' => 'VALID']);
            return redirect()->back();
        }
    }
}
