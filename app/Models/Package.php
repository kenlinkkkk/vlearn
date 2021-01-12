<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $fillable = [
        'name','slug', 'picture', 'package_code', 'price', 'duration', 'description', 'fa_package', 'status'
    ];

    public function packages()
    {
        return $this->hasMany(Package::class, 'fa_package');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'fa_package');
    }

    public function withLessons()
    {
        return $this->hasMany(Lesson::class, 'package_id');
    }
}
