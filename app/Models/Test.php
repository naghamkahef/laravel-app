<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tests';

    protected $primaryKey = 'id';

    protected $fillable = [
        'character_id',
        'word',
        'image'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function fillQuestions()
    {
        return $this->hasMany(FillInTheBlankQuestion::class);
    }

    public function trueFalseQuestions()
    {
        return $this->hasMany(TrueFalseQuestion::class);
    }

    public function wordSelections()
    {
        return $this->hasMany(WordSelection::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // public function gameType()
    // {
    //     return $this->belongsTo(GameType::class);
    // }

    public function students()
    {
        return $this->belongsToMany(Student::class)
            ->withPivot('score')
            ->withTimestamps();
    }


}
