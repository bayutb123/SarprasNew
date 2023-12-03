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
        Schema::create('outdoor_clean_status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->date('date');
            $table->unsignedBigInteger('author');
            $table->unsignedBigInteger('period_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('period_id')->references('id')->on('outdoor_clean_period');
            $table->foreign('author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outdoor_clean_status');
    }
};
