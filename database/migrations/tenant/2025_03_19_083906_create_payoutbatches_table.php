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
        Schema::create('payoutbatches', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->float('total_amount', 10,2);
            $table->string('status');
            $table->string('batch_id');
            $table->string('payment_processor');
            $table->date('processed_at');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payoutbatches');
    }
};
