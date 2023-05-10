<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la llave foranea a la tabla compras
    public function up()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('tipo_compra_id')->references('id')->on('tipo_compras');
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            //
        });
    }
};
