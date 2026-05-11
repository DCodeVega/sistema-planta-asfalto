<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_salida', function (Blueprint $table) {
            $table->id('id_detalle_salida');
            $table->foreignId('id_salida')->constrained('salida', 'id_salida')->onDelete('cascade');
            $table->foreignId('id_detalle_ingreso')->constrained('detalle_ingreso', 'id_detalle_ingreso');
            $table->decimal('cantidad_salida', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_salida');
    }
};
