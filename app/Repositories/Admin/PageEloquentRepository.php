<?php


namespace App\Repositories\Admin;


use App\Models\Page;
use App\Repositories\EloquentRepository;

class PageEloquentRepository extends EloquentRepository
{

    public function getModel()
    {
        return Page::class;
    }
}
