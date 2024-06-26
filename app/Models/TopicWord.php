<?php

namespace App\Models;

use App\Traits\ToastNotifications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'word',
        'topic_id'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
