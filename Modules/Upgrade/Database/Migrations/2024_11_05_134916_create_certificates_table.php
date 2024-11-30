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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('education_qualifications');
            $table->string('university_name');
            $table->string('degree_title');
            $table->integer('GPA');
            $table->date('year_of_graduation');
            $table->string('certificate_name');
            $table->string('certificate_type');
            $table->string('source_of_certificate');
            $table->string('courses_name');
            $table->integer('years_of_experience');
            $table->string('company_name');
            $table->string('company_title');
            $table->string('company_location');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('job_offer_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
