<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('car_id')->nullable(false);
            $table->uuid('buyer_id')->nullable(false);
            $table->bigInteger('amount')->nullable(false);
            $table->string('recipient')->nullable(false);
            $table->text('address')->nullable(false);
            $table->string('status')->nullable(false);
            $table->string('transaction_type')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('car_id')->references('id')->on('car')->onDelete('cascade');
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
