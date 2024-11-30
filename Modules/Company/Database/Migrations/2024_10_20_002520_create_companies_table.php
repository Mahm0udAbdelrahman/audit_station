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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('email')->unique();

            $table->enum('status',['activated','deactivated'])->default('activated');
            $table->boolean('show')->default(true);
            $table->string('phone');
            $table->string('position');
            $table->string('specialization');
            $table->string('country');
            $table->string('companyAddress');
            $table->string('certificate')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
