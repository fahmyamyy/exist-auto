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
        Schema::create('comment', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->string('forum_id')->nullable(false);
            $table->text('comment')->nullable(false);
            $table->uuid('created_by')->nullable(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('forum_id')->references('id')->on('forum')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
