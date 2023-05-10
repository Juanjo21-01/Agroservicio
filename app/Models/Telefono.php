<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefono extends Model
{
  //Deshabilitar datos 
  use SoftDeletes;

  //Registrar la nueva columna
  protected $dates = ['deleted_at'];


  //TODO: Campos que se reciben para almacenarlos en la bd
  protected $fillable = ['proveedor_id', 'telefono'];


  //TODO: Relacion con la tabla proveedores
  public function proveedore()
  {
    return $this->belongsTo(Proveedore::class);
  }
}
