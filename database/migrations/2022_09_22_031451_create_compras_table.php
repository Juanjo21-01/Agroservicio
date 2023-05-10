<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla compras a la base de datos
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            //   $table->engine = 'InnoDB';

            $table->id();

            $table->date('fecha_compra');

            $table->decimal('total', 12, 2);
            $table->decimal('impuesto');
            $table->string('descripcion', 100)->nullable();
            $table->enum('status', ['VALID', 'CANCELED'])->default('VALID');

            $table->bigInteger('proveedor_id')->unsigned();
            $table->bigInteger('tipo_compra_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla compras de la base de datos
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};
