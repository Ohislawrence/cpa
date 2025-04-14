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
        Schema::create('affiliatedetails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('status', ['Pending', 'Rejected', 'Active']);
            $table->string('city');
            $table->string('country');
            $table->string('region');
            $table->string('phonenumber');
            $table->string('paypal_email');
            $table->unsignedInteger('tier_id')->default(1); 
            $table->string('wise_email');
            $table->string('payoneer_ID');
            $table->text('instantmessageid');
            $table->integer('referral_id')->nullable();
            $table->integer('referred_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliatedetails');
    }
};
