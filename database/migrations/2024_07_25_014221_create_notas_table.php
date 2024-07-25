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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->enum('periodo', ['1','2','3','4']);
            $table->string('nombre_nota', 30);
            $table->string('descripcion', 200);
            $table->float('valor', 8, 2);
            $table->timestamps();

            $table->foreign('estudiante_id')->references('idEstudiante')->on('estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
