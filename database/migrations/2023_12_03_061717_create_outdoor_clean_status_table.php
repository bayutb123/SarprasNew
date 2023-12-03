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
            $table->string('statusw1');
            $table->date('statusw1date')->nullable();
            $table->string('statusw2');
            $table->date('statusw2date')->nullable();
            $table->string('statusw3');
            $table->date('statusw3date')->nullable();
            $table->string('statusw4');
            $table->date('statusw4date')->nullable();
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
