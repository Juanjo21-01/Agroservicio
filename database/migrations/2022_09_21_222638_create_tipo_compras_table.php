<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla tipo_compras a la base de datos
    public function up()
    {
        Schema::create('tipo_compras', function (Blueprint $table) {

            $table->id();
            $table->string('nombre', 25);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla tipo_compras de la base de datos
    public function down()
    {
        Schema::dropIfExists('tipo_compras');
    }
};
