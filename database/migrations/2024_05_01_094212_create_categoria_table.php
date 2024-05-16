<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    * Arrancar Migración Categoría.
    */
    public function up(): void
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('nombre_categoria', 40);
            $table->timestamps();
        });
    }

    /**
     * Borrar Migración Categoría.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria');
    }
};
