<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Course\Enums\CertificationsEnum;
use Modules\Course\Enums\SkillLevelEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_name');
            $table->string('course_name');
            $table->integer('price')->nullable();
            $table->integer('percentage');
            $table->longText('description');
            $table->string('date');
            $table->time('duration');
            $table->integer('lessons');
            $table->integer('quizzes');
            $table->unsignedBigInteger('level')->default(SkillLevelEnum::Beginner)->nullable();
            $table->unsignedBigInteger('certifications')->default(CertificationsEnum::YES)->nullable();
            $table->foreignId('instructor_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_modules');
        Schema::dropIfExists('courses');
    }
};
