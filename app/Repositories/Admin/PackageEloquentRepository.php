<?php


namespace App\Repositories\Admin;


use App\Models\Package;
use App\Repositories\EloquentRepository;

class PackageEloquentRepository extends EloquentRepository
{

    public function getModel()
    {
        return Package::class;
    }
}
