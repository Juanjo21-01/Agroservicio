<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TipoCliente extends Model
{
    //Deshabilitar datos 
    use SoftDeletes;

    //Registrar la nueva columna
    protected $dates = ['deleted_at'];


    //TODO: Campos que se reciben para almacenarlos en la bd
    protected $fillable = ['nombre'];


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


    //TODO: RELACIONES DE LA TABLA TIPO DE CLIENTES

    // Con la tabla clientes
    public function cliente()
    {
        return $this->hasMany(Cliente::class);
    }
}
