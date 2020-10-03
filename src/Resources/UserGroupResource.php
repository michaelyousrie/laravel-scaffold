<?php

namespace LaravelScaffold\Resources;

class UserGroupResource extends ScaffoldResource
{
    public function makeData(): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'permissions'   => $this->permissions->pluck('permission')
        ];
    }
}
