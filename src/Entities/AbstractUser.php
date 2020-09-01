<?php

namespace LaravelScaffold\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class AbstractUser extends Authenticatable
{
    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }

    public function hasPermissionTo(string $permission)
    {
        return $this->group->permissions()->where(function ($where) use ($permission) {
            $where->where('permission', '*')
                ->orWhere('permission', $permission);
        })->first() ? true : false;
    }
}
