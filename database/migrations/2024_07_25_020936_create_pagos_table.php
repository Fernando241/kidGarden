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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matricula_id');
            $table->unsignedBigInteger('valores_id');
            $table->timestamps();

            $table->foreign('matricula_id')->references('id')->on('matriculas');
            $table->foreign('valores_id')->references('id')->on('valores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
