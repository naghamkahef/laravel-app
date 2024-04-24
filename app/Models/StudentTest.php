<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTest extends Model
{
    use HasFactory;
    protected $table = 'student_tests';

    protected $primaryKey = 'id';

    protected $fillable = [
        'student_id',
        'test_id',
        'level_id',
        'score',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function fillInTheBlankAnswers()
    {
        return $this->hasMany(FillInTheBlankAnswer::class);
    }

    public function wordAnswers()
    {
        return $this->hasMany(WordAnswer::class);
    }

    public function studentTrueFalseAnswer()
    {
        return $this->belongsTo(StudentTrueFalseAnswer::class);
    }

    public function studentFillBlankQuestionAnswer()
    {
        return $this->belongsTo(StudentFillBlankQuestionAnswer::class);
    }

    public function studentWoedSelectionAnswer()
    {
        return $this->belongsTo(StudentWoedSelectionAnswer::class);
    }
}
