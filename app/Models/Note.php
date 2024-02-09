<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'annotation'
    ];

    public function student() 
    {
        return $this->belongsTo(Student::class);
    }
}
