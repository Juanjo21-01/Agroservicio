<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    //Deshabilitar datos 
    use SoftDeletes;

    //Registrar la nueva columna
    protected $dates = ['deleted_at'];


    //TODO: Campos que se reciben para almacenarlos en la bd
    protected $fillable = ['fecha_venta', 'total', 'cantidad_medida', 'conversion_menor_id',  'status', 'tipo_venta_id', 'cliente_id', 'usuario_id', 'descripcion'];


    //TODO: RELACIONES DE LA TABLA VENTAS

    // Con la tabla tipo venta
    public function tipoVenta()
    {
        return $this->belongsTo(TipoVenta::class);
    }

    // Con la tabla clientes
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Con la tabla usuarios
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Con la tabla detalle ventas
    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
