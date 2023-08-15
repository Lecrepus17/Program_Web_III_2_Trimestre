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
        Schema::create('filcaters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filme_fk')->constrained(
                table: 'filmes'
            );
            $table->foreignId('categoria_fk')->constrained(
                table: 'categorias'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filcaters');
    }
};
