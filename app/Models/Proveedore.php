<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Proveedore extends Model
{
    //Deshabilitar datos 
    use SoftDeletes;

    //Registrar la nueva columna
    protected $dates = ['deleted_at'];


    //TODO: Campos que se reciben para almacenarlos en la bd
    protected $fillable = ['nombre', 'nit', 'direccion'];


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

    // --> direccion
    protected function direccion(): Attribute
    {
        return new Attribute(
            // primera letra de cada palabra en mayuscula
            get: fn ($value) => ucwords($value),
            // almacena todo en minuscula
            set: fn ($value) => strtolower($value)
        );
    }


    //TODO: RELACIONES DE LA TABLA PROVEEDORES

    // Con la tabla productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    // Con la tabla compras
    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    // Con la tabla telefonos
    public function telefonos()
    {
        return $this->hasMany(Telefono::class);
    }
}
