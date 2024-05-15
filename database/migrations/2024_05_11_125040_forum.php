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
        Schema::create('forum', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable(false);
            $table->text('content')->nullable(false);
            $table->uuid('created_by')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum');
    }
};
