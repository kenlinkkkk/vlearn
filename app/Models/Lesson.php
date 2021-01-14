<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = [
        'name', 'slug', 'package_id', 'image', 'video', 'description', 'view_count', 'status'
    ];

    public function withPackage()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function withLogs()
    {
        return $this->hasMany(ActionLog::class, 'lesson_id');
    }
}
