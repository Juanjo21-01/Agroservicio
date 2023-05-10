<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    //Deshabilitar datos 
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    //Registrar la nueva columna
    protected $dates = ['deleted_at'];

    //TODO: Campos que se reciben para almacenarlos en la bd
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //TODO: RELACIONES DE LA TABLA USUARIOS

    // Con la tabla compras
    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    // Con la tabla ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
