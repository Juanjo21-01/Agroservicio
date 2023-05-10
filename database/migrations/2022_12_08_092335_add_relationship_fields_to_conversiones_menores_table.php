<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la llave foranea a la tabla conversiones menores
    public function up()
    {
        Schema::table('conversiones_menores', function (Blueprint $table) {
            $table->foreign('conversion_id')->references('id')->on('conversiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversiones_menores', function (Blueprint $table) {
            //
        });
    }
};
