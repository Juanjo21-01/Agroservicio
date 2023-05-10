<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la llave foranea a la tabla clientes
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->foreign('tipo_cliente_id')->references('id')->on('tipo_clientes');
        });
    }

    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
        });
    }
};
