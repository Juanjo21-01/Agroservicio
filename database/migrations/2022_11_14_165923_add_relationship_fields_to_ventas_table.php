<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la llave foranea a la tabla ventas
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('tipo_venta_id')->references('id')->on('tipo_ventas');
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            //
        });
    }
};
