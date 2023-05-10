<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TipoProducto extends Model
{
  //Deshabilitar datos 
  use SoftDeletes;

  //Registrar la nueva columna
  protected $dates = ['deleted_at'];


  //TODO: Campos que se reciben para almacenarlos en la bd
  protected $fillable = ['nombre', 'descripcion'];


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
      // primera letra de cada palabra en mayuscula
      get: fn ($value) => ucwords($value),
      // almacena todo en minuscula
      set: fn ($value) => strtolower($value)
    );
  }


  //TODO: RELACIONES DE LA TABLA TIPO PRODUCTO

  // con la tabla productos
  public function productos()
  {
    return $this->hasMany(Producto::class);
  }
}
