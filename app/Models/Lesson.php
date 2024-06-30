<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'student_id',
        'topic_id'
    ];

    public function words()
    {
        return $this->hasMany(LessonWord::class);    
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);    
    }

    public function sortWords()
    {
        $words = $this->words()->orderByDesc('id')->paginate();

        $words->each(function ($word, $key) use ($words) {
            $word->reverseKey = $words->total() - (($words->currentPage() - 1) * $words->perPage()) - $key;
        });

        return $words;
    }
}
