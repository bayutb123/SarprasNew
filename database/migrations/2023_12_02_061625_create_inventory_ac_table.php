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
        Schema::create('inventory_ac', function (Blueprint $table) {
            $table->id();
            $table->string('ruangan');
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->integer('pk')->default(0);
            $table->integer('production_year')->nullable();
            $table->integer('bought_year')->nullable();
            $table->string('author')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_ac');
    }
};
