<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Interviewerr\Enums\InterviewerrTypeEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interviewer_id')->constraint()->onDelete('cascade');
            $table->time('from_time');
            $table->time('time_to');
            $table->text('notes')->nullable();
            $table->text('description')->nullable();
            $table->string('to_job');
            $table->unsignedBigInteger('type')->default(InterviewerrTypeEnum::Rejected)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
