<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up(): void
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
             $table->string('position')->default('Unknown Position');
            $table->date('date');
            $table->decimal('sallary',10,2)->default(0);
            $table->string('country');
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->enum('type', ['fullTime', 'partTime'])->default('fullTime');
            $table->boolean('is_favorite')->default(false);
            $table->integer('experience')->default(0);
            $table->string('education')->nullable();
            $table->boolean('show')->default(true);
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};
