<?php

namespace LaravelScaffold\Abstracts;

use LaravelScaffold\Helpers\TimeDate;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class AbstractResource extends JsonResource
{
    abstract public function makeData();

    public function toArray($request)
    {
        return array_merge($this->makeData(), [
            'created_at'            => $this->created_at->format(TimeDate::getDefaultFormat()),
            'friendly_created_at'   => $this->created_at->diffForHumans()
        ]);
    }
}
