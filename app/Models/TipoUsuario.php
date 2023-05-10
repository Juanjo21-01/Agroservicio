<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoUsuario extends Model
{
    //Deshabilitar datos 
    use SoftDeletes;
    use HasFactory;

    protected $dates = ['deleted_at'];
}
