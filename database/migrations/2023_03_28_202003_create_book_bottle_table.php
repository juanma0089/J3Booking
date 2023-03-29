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
        Schema::create('book_bottle', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->foreignId('book_id')->references('id')->on('books');
            $table->foreignId('bottle_id')->references('id')->on('bottles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_bottle');
    }
};
