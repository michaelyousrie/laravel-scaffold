<?php

namespace LaravelScaffold\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use LaravelScaffold\Responses\CreatedResponse;
use LaravelScaffold\Responses\SuccessResponse;
use LaravelScaffold\Responses\NotFoundResponse;
use LaravelScaffold\Requests\DeleteMultipleRequest;

abstract class ScaffoldController extends Controller
{
    protected $service;
    protected $resource;

    public function index()
    {
        return (new SuccessResponse)
            ->setData($this->resource::collection($this->service->getAll()))
            ->send();
    }

    public function show($id)
    {
        $object = $this->find($id);
        if (!$object instanceof Model) {
            return $object;
        }

        return (new SuccessResponse)
            ->setData(new $this->resource($object))
            ->send();
    }

    public function destroy($id)
    {
        $object = $this->find($id);
        if (!$object instanceof Model) {
            return $object;
        }

        $this->service->delete($object);

        return (new SuccessResponse)
            ->send();
    }

    public function bulkDestroy(DeleteMultipleRequest $request)
    {
        $objects = [];

        foreach ($request->ids as $id) {
            $object = $this->find($id);
            if (!$object instanceof Model) {
                return $object;
            }
            $objects[] = $object;
        }

        foreach ($objects as $object) {
            $this->service->delete($object);
        }

        return (new SuccessResponse)
            ->send();
    }

    protected function updateObject(Model $object, array $data)
    {
        $object = $this->service->update($object, $data);

        return (new SuccessResponse)
            ->setData(new $this->resource($object))
            ->send();
    }

    protected function find($id)
    {
        $object = $this->service->getById($id);

        if (!$object) {
            return (new NotFoundResponse)
                ->send();
        }

        return $object;
    }

    protected function create(array $data)
    {
        $object = $this->service->create($data);

        return (new CreatedResponse)
            ->setData(new $this->resource($object))
            ->send();
    }
}
