<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_id',
        'user_id'
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);    
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);    
    }

    public function publicTopics(): BelongsToMany 
    {
        return $this->belongsToMany(PublicTopic::class, 'communities', 'teacher_id', 'public_topic_id');
    }

    public function publicTopicsAsTopic()
    {
        $publicTopics = $this->publicTopics;

        $topics = [];
        foreach ($publicTopics as $publicTopic) {
            $topics[] = $publicTopic->topic;
        }

        return $topics;
    }
}
