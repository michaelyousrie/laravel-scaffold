<?php

namespace LaravelScaffold\Resources;

class UserGroupPermissionResource extends ScaffoldResource
{
    public function makeData(): array
    {
        return [
            'id'            => $this->id,
            'permission'    => $this->permission
        ];
    }
}
