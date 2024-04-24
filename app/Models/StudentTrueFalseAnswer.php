<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTrueFalseAnswer extends Model
{
    use HasFactory;

    protected $table = 'student_true_false_answers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'student_test_id',
        'true_false_question_id',
        'answer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function studentTest()
    {
        return $this->belongsTo(StudentTest::class);
    }

    public function trueFalseQuestion()
    {
        return $this->belongsTo(TrueFalseQuestion::class);
    }

}
