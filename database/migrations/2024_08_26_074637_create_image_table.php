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
        Schema::create('image', function (Blueprint $table) {
            $table->id();
            $table->string("path", 512);
            $table->string("text", 2000)->nullable();
            $table->string("description", 150);
            $table->foreignId("section_id")->nullable()->references("id")->on("section")->cascadeOnDelete();
            $table->foreignId("article_id")->nullable()->references("id")->on("article")->cascadeOnDelete();

            // $table->foreignId("section_index")->references("index")->on("section");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image');
    }
};
