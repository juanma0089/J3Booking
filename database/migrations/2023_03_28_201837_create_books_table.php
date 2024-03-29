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
            // $table->date('date');
            // $table->enum('time', ['afternoon', 'night']);
            $table->enum('status', ['waiting', 'cancelled', 'accepted']);
            $table->foreignId('table_id')->nullable()->references('id')->on('tables')->nullOnDelete();
            $table->foreignId('nummesa')->nullable();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->foreignId('event_id')->references('id')->on('events');
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
