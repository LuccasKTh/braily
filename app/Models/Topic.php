<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'teacher_id'
    ];

    public function words()
    {
        return $this->hasMany(TopicWord::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class); 
    }

    public function publicTopics(): HasMany 
    {
        return $this->hasMany(PublicTopic::class);    
    }

    public function sortWords()
    {
        $words = $this->words()->orderBy('id')->paginate(1);

        return $words;
    }
}
