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
        Schema::create('word_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('word_selection_id');
            $table->foreign('word_selection_id')->references('id')->on('word_selections')->onDelete('cascade');
            $table->string('letter');
            $table->boolean('is_correct')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_answers');
    }
};
