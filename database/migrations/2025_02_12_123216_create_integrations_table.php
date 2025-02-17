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
        Schema::create('integrations', function (Blueprint $table) {
            $table->id();
            $table->string('appname');
            $table->string('slug');
            $table->string('icon');
            $table->integer('support_id');
            $table->text('desc');
            $table->string('fImage');
            $table->text('shortDesc');
            $table->string('appcategory_id');
            $table->string('apptype_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrations');
    }
};
