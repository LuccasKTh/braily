<?php

namespace App\Models;

use App\Traits\ToastNotifications;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory, ToastNotifications;

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

    public function likes(): HasMany 
    {
        return $this->hasMany(Like::class);
    }

    public function hasAccess($model): bool
    {
        $teacher = Auth::user()->teacher;
    
        if ($model->getTable() == 'topics') {
            return $this->hasAccessToTopic($model, $teacher);
        }
    
        if ($teacher->user->role->description == 'Professor' && !$teacher->is($model->teacher)) {
            return false;
        }
    
        return true;
    }

    private function hasAccessToTopic($topic, $teacher): bool
    {
        return $teacher->is($topic->teacher) || $topic->isPublicTopic();
    }
}
