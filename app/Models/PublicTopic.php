<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
