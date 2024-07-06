<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'teacher_id'
    ];

    public function words(): HasMany
    {
        return $this->hasMany(TopicWord::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class); 
    }

    public function publicTopic(): HasOne 
    {
        return $this->hasOne(PublicTopic::class);
    }

    public function sortWords()
    {
        $words = $this->words()->orderBy('id')->paginate(1);

        return $words;
    }
}
