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
        Schema::create('clicks', function (Blueprint $table) {
            $table->id();
            $table->integer('offerID');
            $table->integer('user_id');
            $table->integer('country_id');
            $table->string('device');
            $table->string('platform');
            $table->string('browser');
            $table->enum('status', ['Pending', 'Wait', 'Approved']);
            $table->string('smartlink')->nullable();
            $table->string('ip');
            $table->string('clickID');
            $table->float('earned')->nullable();
            $table->float('cost')->nullable();
            $table->integer('conversion')->nullable();
            $table->string('referrerurl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clicks');
    }
};
