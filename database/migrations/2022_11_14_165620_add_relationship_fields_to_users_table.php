<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la llave foranea a la tabla users
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('tipo_usuarios_id')->references('id')->on('tipo_usuarios');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
