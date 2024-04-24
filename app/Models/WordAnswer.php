<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WordAnswer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'word_answers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'word_selection_id',
        'letter',
        'is_correct',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function wordSelection()
    {
        return $this->belongsTo(WordSelection::class);
    }
    
}
