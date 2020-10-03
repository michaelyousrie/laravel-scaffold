<?php

namespace LaravelScaffold\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    public function permissions()
    {
        return $this->hasMany(UserGroupPermission::class);
    }
}
