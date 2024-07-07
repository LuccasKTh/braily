<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'public_topic_id'
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);    
    }

    public function publicTopic(): BelongsTo 
    {
        return $this->belongsTo(PublicTopic::class);    
    }
}
