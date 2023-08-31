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
        Schema::create('pet_models', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30)->nullable(false);
            $table->string('idade',2)->nullable(false);
            $table->string('raca', 20)->nullable(false);
            $table->string('requerimentos')->nullable(false);
            $table->string('enfermidades')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_models');
    }
};
