<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'characters';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'character',
        'Char_first',
        'word_first',
        'image_first',
        'canvas_first',
        'Char_middle',
        'word_middle',
        'image_middle',
        'canvas_middle',
        'Char_last',
        'word_last',
        'image_last',
        'canvas_last'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function  level()
    {
        return $this->belongsTo(Level::class);
    }

    public function  category()
    {
        return $this->belongsTo(Category::class);
    }

    public function test()
    {
        return $this->hasOne(Test::class);
    }

    public function shapes()
    {
        return $this->hasMany(Shape::class);
    }
    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
