<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TopicWord;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function words()
    {
        return $this->hasMany(TopicWord::class, 'topic_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
