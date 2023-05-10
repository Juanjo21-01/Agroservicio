<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla users a la base de datos
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->engine = 'InnoDB';

            $table->id();
            $table->string('name', 20);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);

            $table->bigInteger('tipo_usuarios_id')->unsigned();

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla users de la base de datos
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
