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
        Schema::create('requestpayments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('amount');
            $table->string('method');
            $table->integer('number');
            $table->string('batch_id');
            $table->enum('status', ['Request', 'Paid', 'On-hold','Failed','Processing']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requestpayments');
    }
};
