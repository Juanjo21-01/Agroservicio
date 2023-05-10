<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleCompra extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];


    //TODO: Campos que se reciben para almacenarlos en la bd
    protected $fillable = ['compra_id', 'producto_id',  'cantidad', 'precio'];


    //TODO: RELACIONES DE LA TABLA DETALLE DE COMPRAS

    // Con la tabla compras
    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    // Con la tabla productos
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
