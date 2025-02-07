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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('thumbnail')->nullable();
            $table->string('url')->nullable();
            $table->integer('status')->default(0);
            $table->integer('views')->default(0);
            $table->integer("number")->default(0);
            $table->timestamp('expired_at')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
