<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    protected $table = 'action_logs';

    protected $fillable = [
        'msisdn', 'action', 'lesson_id', 'note'
    ];

    public function lesson()
    {
        $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
