<?php

namespace LaravelScaffold\Abstracts;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;

    public function getAll()
    {
        return $this->model::all();
    }

    public function getById(int $id)
    {
        return $this->model::find($id) ?: false;
    }

    public function getBy(string $property, $value)
    {
        return $this->model::where($property, $value)->first() ?: false;
    }

    public function create(array $data)
    {
        $object = $this->model::forceCreate($data);
        $object->save();

        return $object;
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

    public function deleteBy(string $property, $value)
    {
        $object = $this->getBy($property, $value);

        if ($object != false) {
            return $this->delete($object);
        }

        return false;
    }

    public function deleteById(int $id)
    {
        $object = $this->getById($id);

        if ($object != false) {
            return $this->delete($object);
        }

        return false;
    }

    public function getCount()
    {
        return $this->model::count();
    }
}
