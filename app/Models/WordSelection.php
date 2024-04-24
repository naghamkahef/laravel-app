<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WordSelection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'word_selections';

    protected $primaryKey = 'id';

    protected $fillable = [
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

    public function wordAnswers()
    {
        return $this->hasMany(WordAnswer::class);
    }
}
