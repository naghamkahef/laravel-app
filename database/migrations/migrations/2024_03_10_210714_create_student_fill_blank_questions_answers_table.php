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
        Schema::create('student_f_b_q_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_test_id');
            $table->foreign('student_test_id')->references('id')->on('student_tests')->onDelete('cascade');

            $table->unsignedBigInteger('fill_in_the_blank_question_id');
            $table->foreign('fill_in_the_blank_question_id')->references('id')->on('fill_in_the_blank_questions')->onDelete('cascade');

            $table->unsignedBigInteger('fill_in_the_blank_answer_id');
            $table->foreign('fill_in_the_blank_answer_id')->references('id')->on('fill_in_the_blank_answers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fill_blank_questions_answers');
    }
};
