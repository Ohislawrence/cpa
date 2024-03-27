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
        Schema::create('trafficsources', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('source');
            $table->text('address');
            $table->string('rank');
            $table->string('followers');
            $table->string('monthlyvisit');
            $table->text('note');
            $table->enum('status', ['Pending', 'Wait', 'Active']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trafficsources');
    }
};
