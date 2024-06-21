<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function students() 
    {
        return $this->hasMany(Student::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
