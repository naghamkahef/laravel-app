<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FillInTheBlankAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fill_in_the_blank_answers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'question_id',
        'letter',
        'is_correct',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function question()
    {
        return $this->belongsTo(FillInTheBlankQuestion::class, 'question_id');
    }
}
