<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //TODO: Enviar la tabla productos a la base de datos
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            //  $table->engine = 'InnoDB';

            $table->id();
            $table->string('nombre', 50)->unique();
            $table->string('imagen')->nullable();
            $table->string('descripcion', 100);
            $table->decimal('precio_venta', 12, 2);
            $table->decimal('stock', 12, 2)->default(0);
            $table->date('fecha_vencimiento')->nullable();
            $table->string('code')->unique()->nullable();
            $table->enum('status', ['ACTIVE', 'DEACTIVATED'])->default('ACTIVE');

            $table->bigInteger('conversion_id')->unsigned();
            $table->bigInteger('tipo_producto_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    //TODO: Eliminar la tabla productos de la base de datos
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
