<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla conversiones menores a la base de datos
    public function up()
    {
        Schema::create('conversiones_menores', function (Blueprint $table) {

            $table->id();
            $table->string('nombre', 25)->unique();
            $table->enum('status', ['ACTIVE', 'DEACTIVATED'])->default('ACTIVE');

            $table->bigInteger('conversion_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla conversiones menores a la base de datos
    public function down()
    {
        Schema::dropIfExists('conversiones_menores');
    }
};
