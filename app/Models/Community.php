<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'public_topic_id'
    ];

    public function teachers(): HasMany 
    {
        return $this->hasMany(Teacher::class);
    }

    public function publicTopics(): HasMany
    {
        return $this->hasMany(PublicTopic::class);
    }

    public function tstes()
    {
        $community = $this;
        
        dd($community);
    }
}
