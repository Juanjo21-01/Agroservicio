<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la llave foranea a la tabla productos
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->foreign('conversion_id')->references('id')->on('conversiones');
            $table->foreign('tipo_producto_id')->references('id')->on('tipo_productos');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            //
        });
    }
};
