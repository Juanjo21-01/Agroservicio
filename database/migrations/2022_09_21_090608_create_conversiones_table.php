<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla conversiones a la base de datos
    public function up()
    {
        Schema::create('conversiones', function (Blueprint $table) {

            $table->id();
            $table->string('nombre', 25)->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla conversiones a la base de datos
    public function down()
    {
        Schema::dropIfExists('conversiones');
    }
};
