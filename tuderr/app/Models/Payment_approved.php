<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_approved extends Model
{
    protected $fillable = [
        'approved_by',
        'payment_id',
        'approved_date',
        'remarks',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
