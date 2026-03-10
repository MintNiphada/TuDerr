<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'lesson_name', 
        'content', 
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
