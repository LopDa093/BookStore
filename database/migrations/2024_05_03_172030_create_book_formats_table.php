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
        Schema::create('book_formats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')
            ->constrained()
            ->onDelete('cascade');
            $table->enum('format', ['paperback', 'ebook', 'audiobook']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_formats');
    }
};
