<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('elemento_ordens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_id')->constrained('ordens')->onDelete('cascade');
            $table->foreignId('variante_producto_id')->constrained('variante_productos')->onDelete('cascade');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('elemento_ordens');
    }
};