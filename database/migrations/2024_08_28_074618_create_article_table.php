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
        
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255);
            $table->mediumText("intro");
            $table->boolean("locked");
            $table->foreignId('user_id')->references('id')->on("user");
            $table->foreignId('editor_id')->references('id')->on("user");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
