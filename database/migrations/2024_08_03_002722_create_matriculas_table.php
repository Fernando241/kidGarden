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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_matricula')->unique();
            $table->unsignedBigInteger('estudiante_id');
            $table->unsignedBigInteger('acudiente_id');
            $table->unsignedBigInteger('curso_id');
            $table->enum('situacion', ['nuevo estudiante', 'promovido', 'repitente']);
            $table->enum('procedencia', ['Misma Institución', 'Otra Institución']);
            $table->timestamps();

            $table->foreign('estudiante_id')->references('idEstudiante')->on('estudiantes');
            $table->foreign('acudiente_id')->references('id')->on('acudientes');
            $table->foreign('curso_id')->references('idCurso')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
