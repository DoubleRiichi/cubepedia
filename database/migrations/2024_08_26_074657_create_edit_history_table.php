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
        Schema::create('edit_history', function (Blueprint $table) {
            $table->id();
            $table->mediumText("old_text");
            $table->mediumText("new_text");
            $table->foreignId("section_id")->nullable()->references("id")->on("section");
            $table->foreignId("article_id")->nullable()->references("id")->on("section");
            $table->foreignId("user_id")->references("id")->on("user");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edit_history');
    }
};
