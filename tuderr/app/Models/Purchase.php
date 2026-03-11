<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [
        'user_id',
        'course_id',
        'payment_slip',
        'status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}