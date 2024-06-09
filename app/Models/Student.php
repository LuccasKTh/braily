<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'age',
        'enroll',
        'about',
        'education_id',
        'skill_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skill() 
    {
        return $this->belongsTo(Skill::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);    
    }

    public function lastLesson()
    {
        if ($this->lessons->isNotEmpty()) {
            return $this->lessons->last()->created_at;
        }
    }
}
