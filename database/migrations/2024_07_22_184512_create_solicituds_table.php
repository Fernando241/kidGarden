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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_documento', ['nacido vivo', 'registro civil', 'tarjeta de identidad', 'tarjeta de extranjería']);
            $table->string('documento', 15);
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->date('fecha_nacimiento');
            $table->enum('grado', ['Parvulos','Pre Jardin', 'Jardin', 'Transicion']);
            $table->enum('tipo_documento_padre', ['cédula de ciudadanía', 'cédula de extranjería']);
            $table->string('documento_padre', 15);
            $table->string('nombres_padre', 50);
            $table->string('apellidos_padre', 50);
            $table->string('telefono', 15);
            $table->string('direccion');
            $table->string('correo', 100);
            $table->string('parentesco', 30);
            $table->foreignId('user_id')->constrained(); //campo para crear la realación al usuario que envia la solicitud
            $table->enum('estado', ['en_proceso', 'aprobada', 'rechazada'])->default('en_proceso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
