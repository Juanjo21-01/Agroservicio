<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla tipo_productos a la base de datos
    public function up()
    {
        Schema::create('tipo_productos', function (Blueprint $table) {
            //  $table->engine = 'InnoDB';

            $table->id();
            $table->string('nombre', 50)->unique();
            $table->string('descripcion', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla tipo_productos de la base productos
    public function down()
    {
        Schema::dropIfExists('tipo_productos');
    }
};
