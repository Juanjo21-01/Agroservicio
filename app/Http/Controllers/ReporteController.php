<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReporteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // REPORTE POR DIA
    public  function reporte_dia()
    {
        $ventas = Venta::whereDate('fecha_venta', Carbon::today('America/Guatemala'))->get();
        $total = $ventas->sum('total');
        return view('reporte.reporte_dia', compact('ventas', 'total'));
    }


    // REPORTE POR FECHA
    public  function reporte_fecha()
    {
        $ventas = Venta::whereDate('fecha_venta', Carbon::today('America/Guatemala'))->get();
        $total = $ventas->sum('total');
        return view('reporte.reporte_fecha', compact('ventas', 'total'));
    }


    // RESULTADO DE REPORTE 
    public  function reporte_resultados(Request $request)
    {
        $fechaInicio = $request->fecha_inicio . ' 00:00:00';
        $fechaFin = $request->fecha_fin . ' 23:59:59';

        $ventas = Venta::whereBetween('fecha_venta', [$fechaInicio, $fechaFin])->get();
        $total = $ventas->sum('total');

        return view('reporte.reporte_fecha', compact('ventas', 'total'))
            ->with('success', 'Rango de Fechas Correcto');
    }
}
