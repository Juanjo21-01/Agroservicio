<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla proveedores a la base de datos
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            //  $table->engine = 'InnoDB';

            $table->id();
            $table->string('nombre', 50)->unique();
            $table->string('nit', 15);
            $table->string('direccion', 80);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla proveedores de la base de datos
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
};
