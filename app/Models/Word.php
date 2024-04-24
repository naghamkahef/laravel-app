<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{
    use HasFactory ;
    protected $table = 'words';

    protected $primaryKey = 'id';

    protected $fillable = [
        'word',
        'level_id',
        'character_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
