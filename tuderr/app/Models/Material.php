<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'material_name', 
        'file_path', 
        'lesson_id',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
