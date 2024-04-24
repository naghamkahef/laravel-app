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
        'pronunciation',
        'level_id',
        'category_id',
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

    public function tests()
    {
        return $this->hasMany(Test::class);
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
