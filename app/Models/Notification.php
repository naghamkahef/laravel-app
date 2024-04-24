<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'notifications';

    protected $primaryKey = 'id';

    protected $fillable = [
        'notification_text',
        'approval_status',
        'parent_id',
        'student_id',
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

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
