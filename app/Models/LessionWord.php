<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessionWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'word',
        'lession_id'
    ];

    public function lession()
    {
        return $this->belongsTo(Lession::class);
    }
}
