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
        Schema::create('agencydetails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('active');
            $table->string('companyname');
            $table->string('brandurl');
            $table->string('brandaddress');
            $table->string('city');
            $table->string('country');
            $table->string('region');
            $table->string('phonenumber');
            $table->text('brandname');
            $table->text('branddesc');
            $table->text('brandproductlandingurl');
            $table->integer('category_id');
            $table->text('brandtargetgeos');
            $table->text('brandpreferredpayouttype');
            $table->text('brandpaymenyterm');
            $table->text('brandinstantmessager');
            $table->text('brandinstantmessageid');
            $table->text('brandinterestedtraffic');
            $table->text('brandmonthlybudget');
            $table->text('brandtracking');
            $table->string('paypal_webhook_id');
            $table->string('payoneer_api_token');
            $table->string('payoneer_merchant_id');
            $table->string('client_id');
            $table->string('secret');
            $table->string('paypal_email');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencydetails');
    }
};
