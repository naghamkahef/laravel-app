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
        Schema::create('prepositions', function (Blueprint $table) {
            $table->string('name')->primary();  // Preposition name as primary key
            $table->string('sentence');         // Pre-word associated with the preposition
            $table->unsignedBigInteger('level_id')->default(29);
            $table->foreign('level_id')->references('id')->on('levels');
            $table->string('image')->nullable();      // Path to an image file
            $table->string('sound')->nullable();      // Path to a sound file
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prepositions');
    }
};
