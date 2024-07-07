<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PublicTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id'
    ];

    public function topic(): BelongsTo 
    {
        return $this->belongsTo(Topic::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'communities', 'public_topic_id', 'teacher_id');
    }

    public function likes(): HasMany 
    {
        return $this->hasMany(Like::class);    
    }
}
