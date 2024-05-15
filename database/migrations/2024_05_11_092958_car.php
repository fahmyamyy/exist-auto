<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('car', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('car_model_id')->nullable(false);
            $table->integer('year')->nullable(false);
            $table->string('transmission')->nullable(false);
            $table->string('color')->nullable(false);
            $table->string('location')->nullable(false);
            $table->integer('price_cash')->nullable(true);
            $table->integer('price_credit')->nullable(true);
            $table->string('price_installment', 5)->nullable(true);
            $table->integer('mileage')->nullable(false);
            $table->string('status')->nullable(false);
            $table->uuid('seller')->nullable(false);
            $table->date('inspection_date')->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            // Set foreign key constraints
            $table->foreign('car_model_id')->references('id')->on('car_model')->onDelete('cascade');
            $table->foreign('seller')->references('id')->on('users')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car');
    }
};
