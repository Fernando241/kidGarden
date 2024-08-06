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
        Schema::create('acudientes', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_documento_acudiente', ['cédula de ciudadanía', 'cédula de extranjería']);
            $table->string('documento_acudiente', 20);
            $table->string('nombres_acudiente', 50);
            $table->string('apellidos_acudiente', 50);
            $table->string('telefono', 20);
            $table->string('direccion');
            $table->string('correo', 150);
            $table->string('parentesco', 40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acudientes');
    }
};
