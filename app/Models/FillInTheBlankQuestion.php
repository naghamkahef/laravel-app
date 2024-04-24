<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FillInTheBlankQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fill_in_the_blank_questions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'question',
        'word',
        'question_mark',
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
