<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'birth',
        'enroll',
        'about',
        'education_id',
        'skill_id',
        'teacher_id'
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);    
    }

    public function lastLesson()
    {
        if ($this->lessons->isNotEmpty()) {
            return $this->lessons->last()->created_at;
        }
    }

    public function age()
    {
        return Carbon::parse($this->birth)->age;
    }
}
