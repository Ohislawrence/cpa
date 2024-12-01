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
        Schema::create('kycs', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->unique();
            $table->string('business_email')->unique();
            $table->string('business_name');
            $table->string('contact_email')->unique();
            $table->string('contact_name');
            $table->string('business_phone')->nullable();
            $table->string('contact_phone')->nullable();
            $table->enum('status', ['Pending', 'Wait', 'Active'])->default('Pending');
            $table->integer('current_plan');
            $table->integer('country')->nullable();
            $table->string('website')->nullable();
            $table->text('about')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kycs');
    }
};
