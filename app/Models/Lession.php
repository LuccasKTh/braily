<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'student_id',
        'topic_id'
    ];

    public function words()
    {
        return $this->hasMany(LessionWord::class);
    }
}
