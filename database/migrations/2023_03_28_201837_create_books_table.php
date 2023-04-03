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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->integer('diners');
            $table->enum('booking', ['phone', 'instagram']);
            $table->string('contact', 256)->nullable();
            $table->date('date');
            $table->enum('time', ['afternoon', 'night']);
            $table->enum('status', ['waiting', 'canceled', 'accepted']);
            $table->foreignId('table_id')->references('id')->on('tables')->unsigned();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
