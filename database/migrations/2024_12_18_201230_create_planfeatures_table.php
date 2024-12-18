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
        Schema::create('planfeatures', function (Blueprint $table) {
            $table->id();
            $table->integer('plan_id');
            $table->integer('feature_id');
            $table->string('option')->nullable();
            $table->boolean('is_included')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planfeatures');
    }
};
