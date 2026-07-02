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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); // Relacionamento com Categoria
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable(); // Descrição curta
            $table->longText('long_description')->nullable(); // Texto rico para a página do produto
            $table->decimal('price', 10, 2)->nullable();
            $table->json('features')->nullable(); // Para os checkmarks de benefícios
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
