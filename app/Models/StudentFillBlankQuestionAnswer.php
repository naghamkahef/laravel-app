<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFillBlankQuestionAnswer extends Model
{
    use HasFactory;

    protected $table = 'student_fill_blank_questions_answers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'student_test_id',
        'fill_blank_question_id',
        'fill_blank_answer_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function studentTest()
    {
        return $this->belongsTo(StudentTest::class);
    }

    public function fillInTheBlankQuestion()
    {
        return $this->belongsTo(FillInTheBlankQuestion::class);
    }

    public function fillInTheBlankAnswer()
    {
        return $this->belongsTo(FillInTheBlankAnswer::class);
    }

}
