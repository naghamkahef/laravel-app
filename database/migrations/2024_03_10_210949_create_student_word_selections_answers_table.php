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
        Schema::create('student_word_selections_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_test_id');
            $table->foreign('student_test_id')->references('id')->on('student_tests')->onDelete('cascade');

            $table->unsignedBigInteger('word_selection_id');
            $table->foreign('word_selection_id')->references('id')->on('word_selections')->onDelete('cascade');

            $table->unsignedBigInteger('word_answer_id');
            $table->foreign('word_answer_id')->references('id')->on('word_answers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_word_selections_answers');
    }
};
