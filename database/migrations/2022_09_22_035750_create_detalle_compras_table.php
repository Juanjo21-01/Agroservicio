<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla detalle_compra_productos a la base de datos
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            // $table->engine = 'InnoDB';

            $table->id();

            $table->bigInteger('compra_id')->unsigned();
            $table->bigInteger('producto_id')->unsigned();

            $table->decimal('cantidad', 12, 2);
            $table->decimal('precio', 12, 2);
            $table->bigInteger('conversion_menor_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla detalle_compra_productos de la base de datos
    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
};
