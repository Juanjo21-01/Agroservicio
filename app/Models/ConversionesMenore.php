<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ConversionesMenore extends Model
{
    //Deshabilitar datos 
    use SoftDeletes;

    //Registrar la nueva columna
    protected $dates = ['deleted_at'];


    //TODO: Campos que se reciben para almacenarlos en la bd
    protected $fillable = ['nombre', 'status', 'conversion_id'];


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


    //TODO: RELACIONES DE LA TABLA CONVERSIONES MENORES

    // Con la tabla conversiones menores
    public function conversione()
    {
        return $this->belongsTo(Conversione::class);
    }

    // Con la tabla detalle compras
    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class);
    }

    // Con la tabla detalle ventas
    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
