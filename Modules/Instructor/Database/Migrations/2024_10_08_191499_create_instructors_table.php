<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{



    public function up(): void
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('nationality');
            $table->string('address');
            $table->string('academic_qualification');
            $table->string('previous_work');
            $table->text('description');
            $table->string('university');
            $table->string('degree');
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
