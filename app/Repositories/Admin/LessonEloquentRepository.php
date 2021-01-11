<?php


namespace App\Repositories\Admin;


use App\Models\Lesson;
use App\Repositories\EloquentRepository;

class LessonEloquentRepository extends EloquentRepository
{

    public function getModel()
    {
        return Lesson::class;
    }
}
