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
        Schema::create('evaluations', function (Blueprint $table) {
            
                    $table->id();
                    $table->unsignedBigInteger('student_id');
                    $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
                    $table->unsignedBigInteger('level_id');
                    $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
                    $table->string('evaluation'); // Mark for the student at this level
                    $table->timestamps();
                });
            }
        
      
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
