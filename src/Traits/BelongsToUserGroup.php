<?php

namespace LaravelScaffold\Traits;

use LaravelScaffold\Models\UserGroup;

trait BelongsToUserGroup
{
    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }

    public function hasPermissionTo(string $permission)
    {
        if (!$this->group) {
            return false;
        }

        return $this->group->permissions()->where(function ($where) use ($permission) {
            $where->where('permission', '*')
                ->orWhere('permission', $permission);
        })->first() ? true : false;
    }
}
