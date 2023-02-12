<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassAndSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'class_room_id', 'subject_id', 'session'
    ];

    //relationship shows that assignclassandsubject belongs to classroom and belongs to a subject
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
