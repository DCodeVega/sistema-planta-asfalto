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
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->id('id_detalle_ingreso');
            $table->foreignId('id_ingreso')->constrained('ingreso', 'id_ingreso')->onDelete('cascade');
            $table->foreignId('id_material')->constrained('material', 'id_material');
            $table->decimal('cantidad_adquirida', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ingreso');
    }
};
