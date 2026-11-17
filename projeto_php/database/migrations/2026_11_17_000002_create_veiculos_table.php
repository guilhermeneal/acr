<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('marca', 80);
            $table->string('modelo', 120);
            $table->unsignedSmallInteger('ano');
            $table->decimal('preco', 10, 2);
            $table->unsignedInteger('quilometragem')->default(0);
            $table->text('descricao');
            $table->string('imagem_url', 2048)->nullable();
            $table->boolean('vendido')->default(false);
            $table->timestamps();

            $table->index(['categoria_id', 'vendido']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
