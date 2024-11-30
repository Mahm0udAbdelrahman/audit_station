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
        Schema::create('specialization_answers', function (Blueprint $table) {
            $table->id();
            $table->string('specialization_answer');
            $table->boolean('is_correct')->default(0);
            $table->foreignId('specialization_question_id')->nullable()->constrained('specialization_questions', 'id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialization_answers');
    }
};
