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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('surname', 256)->nullable();
            $table->string('email', 256)->unique();
            $table->string('password', 256);
            $table->enum('jobtitle', ['rrpp'])->nullable();
            $table->enum('role', ['normal','moderator','admin'])->nullable();
            $table->string('phone', 128)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
