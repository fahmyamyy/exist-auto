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
        Schema::create('car_model', function (Blueprint $table) {
            $table->id();
            $table->string('model')->unique();
            $table->unsignedBigInteger('car_type_id')->nullable(false);
            $table->unsignedBigInteger('car_brand_id')->nullable(false);

            $table->foreign('car_type_id')->references('id')->on('car_type')->onDelete('cascade');
            $table->foreign('car_brand_id')->references('id')->on('car_brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars_model');
        Schema::dropIfExists('car_model');
    }
};
