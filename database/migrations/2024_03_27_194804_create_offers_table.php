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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('image');
            $table->enum('status', ['Pending', 'Wait', 'Active']);
            $table->integer('offerid');
            $table->string('name');
            $table->integer('category_id');
            $table->integer('targeting_id');
            $table->integer('geo_id');
            $table->string('payout');
            $table->string('actionurl');
            $table->text('desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
