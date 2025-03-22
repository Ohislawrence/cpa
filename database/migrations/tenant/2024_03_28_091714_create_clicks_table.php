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
            $table->integer('offer_id');
            $table->integer('user_id');
            $table->integer('country_id');
            $table->string('device');
            $table->string('platform');
            $table->string('browser');
            $table->enum('status', ['Pending', 'Refunded', 'Approved', 'Chargeback', 'Paid','Processing']);
            $table->enum('refstatus', ['Pending', 'Approved','Processing', 'Paid']);
            $table->string('smartlink')->nullable();
            $table->string('cost')->nullable();
            $table->string('ip');
            $table->string('clickID');
            $table->float('earned')->nullable();
            $table->float('refcommission')->nullable();
            $table->integer('$referral')->nullable();
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
