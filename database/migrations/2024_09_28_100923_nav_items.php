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
        Schema::create('nav_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('post_slug');
            $table->foreign('post_slug')
                ->references('slug')
                ->on('posts')
                ->onDelete('cascade');
            $table->boolean('is_dropdown')->nullable()->default(false); // Dropdown feature
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_items');
    }
};
