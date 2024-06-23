<?php

use App\Models\Education;
use App\Models\Skill;
use App\Models\Teacher;
use App\Models\User;
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
            $table->integer('enroll')->unique();
            $table->text('about')->nullable();

            $table->foreignId('teacher_id')->constrained('teachers');
            $table->foreignId('skill_id')->constrained('skills');
            $table->foreignId('education_id')->constrained('education');

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
