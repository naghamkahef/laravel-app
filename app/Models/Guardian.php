<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guardian extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes;

    protected $table = 'guardians';

    protected $primaryKey = 'id';

    protected $fillable = [
        'full_name',
        'birthdate',
        'email',
        'password',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    
}
