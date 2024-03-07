<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Topic;

class TopicWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'word',
        'topic_id'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'id');
    }
}
