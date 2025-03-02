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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_category_id');
            $table->string('title');
            $table->integer('views')->default(0);
            $table->text('content')->nullable();
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('slug')->nullable();
            $table->integer('is_show')->default(0);
            $table->integer('is_gallery')->default(0);
            $table->integer('is_certification')->default(0);
            $table->unsignedBigInteger('author_id');
            $table->boolean('is_pin')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
