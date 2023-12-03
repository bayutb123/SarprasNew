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
        Schema::create('outdoor_clean_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outdoor_clean_status_id');
            $table->string('name');
            $table->string('status');
            $table->date('date');
            $table->timestamps();

            $table->foreign('outdoor_clean_status_id')->references('id')->on('outdoor_clean_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outdoor_clean_history');
    }
};
