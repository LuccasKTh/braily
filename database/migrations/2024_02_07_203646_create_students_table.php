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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->integer('age');
            $table->integer('registration')->unique();
            $table->text('about')->nullable();

            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('skill_id')->references('id')->on('skills');
            $table->foreignId('education_id')->references('id')->on('education');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
