<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'levels';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'total_marks',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function characters()
    {
        return $this->hasMany(Character::class);
    }

  
    public function students()
{
    return $this->belongsToMany(Student::class, 'evaluations')->withPivot('evaluation');
}

    
}
