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
        Schema::create('student_true_false_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_test_id');
            $table->foreign('student_test_id')->references('id')->on('student_tests')->onDelete('cascade');


            $table->unsignedBigInteger('true_false_question_id');
            $table->foreign('true_false_question_id')->references('id')->on('true_false_questions')->onDelete('cascade');

            $table->boolean('answer');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_true_false_answers');
    }
};
