<?php

namespace LaravelScaffold\Services;

use Illuminate\Database\Eloquent\Model;
use LaravelScaffold\Responses\FailResponse;

abstract class ScaffoldService
{
    protected $repo;

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function getBy(string $key, $value)
    {
        return $this->repo->getBy($key, $value);
    }

    public function getById(int $id)
    {
        return $this->repo->getById($id);
    }

    public function delete($model)
    {
        if ($model instanceof Model) {
            return $this->repo->delete($model);
        } elseif (is_integer($model)) {
            return $this->rpeo->deleteById($model);
        }

        return (new FailResponse)
            ->send();
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
    }
}
