<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'student_id',
        'topic_id'
    ];

    public function words()
    {
        return $this->hasMany(ClassroomWord::class);    
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);    
    }
}
