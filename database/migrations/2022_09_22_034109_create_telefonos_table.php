<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla telefonos a la base de datos
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            // $table->engine = 'InnoDB';

            $table->id();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->string('telefono', 25);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla telefonos de la base de datos
    public function down()
    {
        Schema::dropIfExists('telefonos');
    }
};
