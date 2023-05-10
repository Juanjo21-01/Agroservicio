<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleVenta extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    //TODO: Campos que se reciben para almacenarlos en la bd
    protected $fillable = ['venta_id', 'producto_id',  'cantidad', 'precio', 'descuento'];


    //TODO: RELACIONES DE LA TABLA DETALLE DE VENTAS

    // Con la tabla ventas
    // public function venta()
    // {
    //     return $this->belongsTo(Venta::class);
    // }

    // Con la tabla producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Con la tabla conversiones menores
    public function conversionesMenore()
    {
        return $this->belongsTo(ConversionesMenore::class);
    }
}
