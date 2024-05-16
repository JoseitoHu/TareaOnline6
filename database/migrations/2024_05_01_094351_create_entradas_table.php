<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Arrancar Migración Entradas.
     */
    public function up(): void
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id('entradas_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('titulo', 40);
            $table->string('imagen', 40);
            $table->text('descripcion');
            $table->timestamp('fecha');
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id_categoria')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Borrar Migración Entradas.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
