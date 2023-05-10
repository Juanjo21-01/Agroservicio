<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla ventas a la base de datos
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            // $table->engine = 'InnoDB';

            $table->id();

            $table->date('fecha_venta');

            $table->decimal('total', 12, 2);
            $table->decimal('impuesto');
            $table->string('descripcion', 100)->nullable();
            $table->enum('status', ['VALID', 'CANCELED'])->default('VALID');

            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('tipo_venta_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla ventas de la base de datos
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
