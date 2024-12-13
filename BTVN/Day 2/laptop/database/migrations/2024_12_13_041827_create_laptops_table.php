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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id('id');
            $table->string('brand', 255);
            $table->string('model', 255);
            $table->string('specifications', 255);
            $table->boolean('rental_status')->default(false);
            $table->unsignedBigInteger('renter-id');
            $table->foreign('renter-id')->references('id')->on('renters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
