<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla tipo_ventas a la base de datos
    public function up()
    {
        Schema::create('tipo_ventas', function (Blueprint $table) {
            // $table->engine = 'InnoDB';

            $table->id();
            $table->string('nombre', 20);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla tipo_ventas de la base de datos
    public function down()
    {
        Schema::dropIfExists('tipo_ventas');
    }
};
