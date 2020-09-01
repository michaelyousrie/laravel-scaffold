<?php

namespace LaravelScaffold\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractUserGroup extends Model
{
    public function permissions()
    {
        return $this->hasMany(UserGroupPermission::class);
    }
}
