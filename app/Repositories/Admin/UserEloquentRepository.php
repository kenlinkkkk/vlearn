<?php


namespace App\Repositories\Admin;


use App\Models\User;
use App\Repositories\EloquentRepository;

class UserEloquentRepository extends EloquentRepository
{

    public function getModel()
    {
        return User::class;
    }
}
