<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWoedSelectionAnswer extends Model
{
    use HasFactory;

    protected $table = 'student_word_selections_answers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'student_test_id',
        'word_selection_id',
        'word_answer_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function studentTest()
    {
        return $this->belongsTo(StudentTest::class);
    }

    public function wordSelection()
    {
        return $this->belongsTo(WordSelection::class);
    }

    public function wordAnswer()
    {
        return $this->belongsTo(WordAnswer::class);
    }
}
