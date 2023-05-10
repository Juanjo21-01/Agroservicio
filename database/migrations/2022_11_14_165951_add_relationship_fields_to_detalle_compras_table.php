<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la llave foranea a la tabla detalle_compra_productos
    public function up()
    {
        Schema::table('detalle_compras', function (Blueprint $table) {
            $table->foreign('compra_id')->references('id')->on('compras');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('conversion_menor_id')->references('id')->on('conversiones_menores');
        });
    }

    public function down()
    {
        Schema::table('detalle_compras', function (Blueprint $table) {
            //
        });
    }
};
