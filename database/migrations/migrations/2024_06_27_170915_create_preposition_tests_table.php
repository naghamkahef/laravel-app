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
        Schema::create('preposition_tests', function (Blueprint $table) {
            $table->id();
            $table->string('sentence');       // Sentence as primary key
            $table->string('preposition_name');          // Preposition name as foreign key
            $table->foreign('preposition_name')->references('name')->on('prepositions')->onDelete('cascade');
                         
            $table->string('image')->nullable();         // Path to an image file
            $table->string('sound')->nullable();         // Path to a sound file
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preposition_tests');
    }
};
