<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Producto extends Model
{
    //Deshabilitar datos 
    use SoftDeletes;

    //Registrar la nueva columna
    protected $dates = ['deleted_at'];


    //TODO: Campos que se reciben para almacenarlos en la bd
    protected $fillable = ['tipo_producto_id', 'proveedor_id', 'imagen', 'nombre', 'code', 'descripcion', 'precio_venta', 'cantidad_medida', 'conversion_id', 'stock', 'fecha_vencimiento', 'status', 'total_medida'];


    // GUARDAR ATRIBUTOS
    // --> nombre
    protected function nombre(): Attribute
    {
        return new Attribute(
            // primera letra de cada palabra en mayuscula
            get: fn ($value) => ucwords($value),
            // almacena todo en minuscula
            set: fn ($value) => strtolower($value)
        );
    }

    // --> descripcion
    protected function descripcion(): Attribute
    {
        return new Attribute(
            // primera letra en mayuscula
            get: fn ($value) => ucfirst($value),
            // almacena todo en minuscula
            set: fn ($value) => strtolower($value)
        );
    }


    //TODO: RELACIONES DE LA TABLA PRODUCTO

    // Con la tabla tipo productos
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class);
    }

    // Con la tabla proveedores
    public function proveedores()
    {
        return $this->belongsTo(Proveedore::class);
    }

    // Con la tabla detalle compras
    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class);
    }

    // Relacion con la tabla detalle ventas
    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class);
    }

    // Con la tabla conversiones
    public function conversione()
    {
        return $this->belongsTo(Conversione::class);
    }
}
