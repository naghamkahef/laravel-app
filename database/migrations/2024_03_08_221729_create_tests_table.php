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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('game_type_id');
            // $table->foreign('game_type_id')->references('id')->on('game_types');
            $table->unsignedBigInteger('character_id');
            $table->foreign('character_id')->references('id')->on('characters');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->text('description');
            $table->float('total_score')->nullable(); // Computed Field 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
