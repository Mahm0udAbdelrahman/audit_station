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
        Schema::create('accountant_offers', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->date('date');
            $table->decimal('sallery',10,2)->default(0);
            $table->enum('type',['fullTime','partTime'])->default('fullTime');
            $table->enum('status',['rejected','approved','waitting'])->default('waitting');
            $table->foreignId('accountant_id')->constrained()->cascadeOnDelete();
            $table->boolean('show')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accountant_offers');
    }
};
