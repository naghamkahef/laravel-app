<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('character');
            $table->string('Char_first');
            $table->string('word_first');
            $table->string('image_first');
            $table->string('canvas_first');
            $table->string('Char_middle');
            $table->string('word_middle');
            $table->string('image_middle');
            $table->string('canvas_middle');
            $table->string('Char_last');
            $table->string('word_last');
            $table->string('image_last');
            $table->string('canvas_last');
            $table->string('sound_first')->nullable();
            $table->string('sound_middle')->nullable();
            $table->string('sound_last')->nullable();
            $table->string('sound_test1')->nullable();
            $table->string('sound_test2')->nullable();
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
