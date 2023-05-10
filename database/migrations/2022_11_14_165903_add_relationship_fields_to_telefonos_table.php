<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la llave foranea a la tabla telefonos
    public function up()
    {
        Schema::table('telefonos', function (Blueprint $table) {
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
    }

    public function down()
    {
        Schema::table('telefonos', function (Blueprint $table) {
            //
        });
    }
};
