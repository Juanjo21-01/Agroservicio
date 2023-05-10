<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // TOTALES
        $totales = DB::select('SELECT (select ifnull (sum(c.total), 0) from compras c where c.status="VALID") as totalcompra, (select ifnull (sum(v.total), 0) from ventas v where v.status="VALID" ) as totalventa');
        // TOTALES POR MES
        $totalespordia = DB::select('SELECT (select ifnull (sum(c.total), 0) from compras c where c.status="VALID" and DATE(c.fecha_compra) = curdate()) as totalcompra, (select ifnull (sum(v.total), 0) from ventas v where v.status="VALID" and DATE(v.fecha_venta) = curdate()) as totalventa');

        // GANANCIAS
        $gananciaCompras = 0;
        $gananciaVentas = 0;
        foreach ($totales as $total) {
            $gananciaCompras = $total->totalcompra;
            $gananciaVentas = $total->totalventa;
        }
        $ganancias = $gananciaVentas - $gananciaCompras;
        // GANANCIAS POR MES
        $gananciaComprasMes = 0;
        $gananciaVentasMes = 0;
        foreach ($totalespordia as $totaldia) {
            $gananciaComprasMes = $totaldia->totalcompra;
            $gananciaVentasMes = $totaldia->totalventa;
        }
        $gananciasmes = $gananciaVentasMes - $gananciaComprasMes;

        // COMPRAS DEL MES
        $comprasmes = DB::select('SELECT monthName(c.fecha_compra) as mes, sum(c.total) as totalmes from compras c where c.status="VALID" group by monthName(c.fecha_compra) order by monthName(c.fecha_compra) desc limit 12');

        // VENTAS DEL MES
        $ventasmes = DB::select('SELECT monthName(v.fecha_venta) as mes, sum(v.total) as totalmes from ventas v where v.status="VALID" group by monthName(v.fecha_venta) order by monthName(v.fecha_venta) desc limit 12');

        // VENTAS POR DIA
        $ventasdia = DB::select('SELECT DATE_FORMAT(v.fecha_venta, "%d/%m/%Y") as dia, count(*) as cantidad,  sum(v.total) as totaldia from ventas v where v.status="VALID" group by v.fecha_venta order by v.fecha_venta desc limit 31');
        // COMPRAS POR DIA
        $comprasdia = DB::select('SELECT DATE_FORMAT(c.fecha_compra, "%d/%m/%Y") as dia, count(*) as cantidad,  sum(c.total) as totaldia from compras c where c.status="VALID" group by c.fecha_compra order by c.fecha_compra desc limit 31');


        return view('inicio', compact('totales', 'totalespordia', 'ganancias', 'gananciasmes', 'comprasmes', 'ventasmes', 'ventasdia', 'comprasdia'));
    }
}
