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
        Schema::create('subscriptiontrackers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('tenant_id')->nullable(); // Foreign key to tenants table
            $table->unsignedBigInteger('plan_id'); // Foreign key to plans table
            $table->unsignedBigInteger('subscriptions_id');
            $table->enum('status', ['active', 'inactive', 'canceled', 'past_due', 'trialing'])->default('active'); // Subscription status
            $table->date('start_date'); // Start date of the subscription
            $table->date('end_date')->nullable(); // End date of the subscription
            $table->date('trial_ends_at')->nullable(); // Trial period end date
            $table->date('next_billing_date')->nullable(); // Next billing cycle date
            $table->date('cancel_at')->nullable(); // Scheduled cancellation date
            $table->date('canceled_at')->nullable(); // Actual cancellation date
            $table->boolean('renewal')->default(true); // Auto-renewal flag
            $table->decimal('price', 10, 2); // Subscription price
            $table->string('currency', 3)->default('USD'); // Currency code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptiontrackers');
    }
};
