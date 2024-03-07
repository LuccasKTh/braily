<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;
use App\Models\User;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    public function student() 
    {
        return $this->belongsTo(Student::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'skill_id');
    }

}
