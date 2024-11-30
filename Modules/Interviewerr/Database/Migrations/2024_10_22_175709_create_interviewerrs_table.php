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
        Schema::create('interviewerrs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('status',['activated','deactivated']);
            $table->enum('show', ['0', '1'])->default('0');
            $table->string('permission');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('level_education')->nullable();
            $table->string('certificate')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviewerrs');
    }
};
