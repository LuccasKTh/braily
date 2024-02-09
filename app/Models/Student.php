<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Skill;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'age',
        'registration',
        'about',
        'education_id',
        'skill_id',
        'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function skill() 
    {
        return $this->hasOne(Skill::class);
    }
}
