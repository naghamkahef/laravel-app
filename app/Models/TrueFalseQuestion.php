<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrueFalseQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'true_false_questions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'question_text',
        'answer',
        'question_score',
        'test_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
