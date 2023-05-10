<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    //Deshabilitar datos 
    use SoftDeletes;

    //Registrar la nueva columna
    protected $dates = ['deleted_at'];


    //TODO: Campos que se reciben para almacenarlos en la bd
    protected $fillable = ['fecha_compra', 'total', 'cantidad_medida', 'conversion_id',  'status', 'tipo_compra_id', 'proveedor_id', 'usuario_id', 'descripcion'];


    //TODO: RELACIONES DE LA TABLA COMPRAS

    // Con la tabla tipo compra
    public function tipoCompra()
    {
        return $this->belongsTo(TipoCompra::class);
    }

    // Con la tabla proveedores
    public function proveedore()
    {
        return $this->belongsTo(Proveedore::class);
    }

    // Con la tabla usuarios
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Con la tabla detalle compras
    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class);
    }
}
