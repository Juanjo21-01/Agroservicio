<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla clientes a la base de datos
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            //   $table->engine = 'InnoDB';

            $table->id();

            $table->string('nombre', 50)->unique();
            $table->string('telefono', 25);
            $table->string('direccion', 80)->nullable();

            $table->bigInteger('tipo_cliente_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla clientes de la base de datos
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
