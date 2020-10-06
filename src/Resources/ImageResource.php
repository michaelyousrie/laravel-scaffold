<?php

namespace LaravelScaffold\Resources;

class ImageResource extends ScaffoldResource
{
    public function makeData(): array
    {
        return [
            'id'            => $this->id,
            'path'          => $this->path,
            'url'           => asset($this->path)
        ];
    }
}
