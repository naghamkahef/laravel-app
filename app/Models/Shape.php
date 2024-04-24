<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shape extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'shapes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'character_id',
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
