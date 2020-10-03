<?php

namespace LaravelScaffold\Resources;

class UserResource extends ScaffoldResource
{
    public function makeData(): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'token'     => $this->api_token,
            'group'     => new UserGroupResource($this->group)
        ];
    }
}
