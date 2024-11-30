<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Upgrade\Enums\ExamEnum;
use Modules\Upgrade\Enums\StatusOrderEnum;
use Modules\Upgrade\Enums\TargetTypeEnum;
use Modules\Upgrade\Enums\TypeEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('upgrades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constraint()->onDelete('cascade');
            $table->unsignedBigInteger('target_type')->default(TargetTypeEnum::NORMAL_USER)->nullable();
            $table->unsignedBigInteger('status')->default(TypeEnum::Waitting)->nullable();
            $table->unsignedBigInteger('interaction')->default(StatusOrderEnum::UNACTIVE)->nullable();
            $table->unsignedBigInteger('exam_passed')->default(ExamEnum::FALSE)->nullable();

            $table->foreignId('exam_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upgrades');
    }
};
