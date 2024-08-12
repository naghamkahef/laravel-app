<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preposition extends Model
{
    use HasFactory;
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'preword',
        'sentence',
        'image',
        'sound',
    ];
    public function  level()
    {
        return $this->belongsTo(Level::class);
    }
}
