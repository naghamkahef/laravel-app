<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use HasFactory, SoftDeletes;
    use Notifiable;

    protected $table = 'students';

    protected $primaryKey = 'id';

    protected $fillable = [
        'full_name',
        'birthdate',
        'email',
        'password',
        'image',
        'level_id',
        'parent_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'parent_id');
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class)
            ->withPivot('score')
            ->withTimestamps();
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function levels()
{
    return $this->belongsToMany(Level::class, 'evaluations')->withPivot('evaluation');
}


}
