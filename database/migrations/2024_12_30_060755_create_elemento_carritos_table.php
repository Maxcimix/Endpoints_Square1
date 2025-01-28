<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('elemento_carritos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carrito_compra_id')->constrained('carrito_compras')->onDelete('cascade');
            $table->foreignId('variante_producto_id')->constrained('variante_productos')->onDelete('cascade');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('elemento_carritos');
    }
};