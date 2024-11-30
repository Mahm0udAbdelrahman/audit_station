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
        Schema::create('send_offers', function (Blueprint $table) {
            $table->id();
            $table->decimal('sallery',8,2)->default(0);
            $table->string('country');
            $table->date('date');
            $table->enum('type',['fullTime','partTime'])->default('fullTime');
            $table->text('description_job');
            $table->string('benefits_job');
            $table->string('terms_job');
            $table->string('company_name');

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_offers');
    }
};
