<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'annotation',
        'student_id'
    ];

    public function student() 
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
