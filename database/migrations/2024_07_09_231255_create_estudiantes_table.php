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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('idEstudiante');
            $table->string('documento', 20);
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('telefono', 15);
            $table->string('direccion', 50);
            $table->string('correo', 50);
           /*  $table->unsignedBigInteger('acudiente_id'); //campo para la llave foranea
            $table->foreign('acudiente_id')->references('idAcudientes')->on('acudientes'); //asignación de la llave foranea al campo creado */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
