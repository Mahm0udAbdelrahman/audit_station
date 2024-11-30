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
        Schema::create('become_companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('owner_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('company_address');
            $table->string('company_work');
            $table->string('position_in_company');
            $table->string('company_headquarter');
            $table->enum('status',['rejected','approved','waitting'])->default('waitting');
            $table->boolean('show')->default(true);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('become_companies');
    }
};
