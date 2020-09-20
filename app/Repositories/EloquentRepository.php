<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use test\Mockery\ReturnTypeObjectTypeHint;

abstract class EloquentRepository
{
    /**
     * @var Model
     */
    protected $_model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     * @return Collection|static[]
     */
    public function getAll()
    {

        return $this->_model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {

        return $this->_model->create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function where($column, $key) {
        return $this->_model->where($column, '=', $key)->orderBy('id', 'desc')->get();
    }

    public function limit($number)
    {
        return $this->_model->limit($number)->get();
    }

    public function edge($c) {
        return $this->_model::with($c)->get();
    }
}
