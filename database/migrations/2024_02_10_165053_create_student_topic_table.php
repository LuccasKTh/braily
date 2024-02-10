<?php

use App\Models\Student;
use App\Models\Topic;

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
        Schema::create('student_topic', function (Blueprint $table) {
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('topic_id')->constrained('topics');

            $table->primary(['student_id', 'topic_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_topic');
    }
};
