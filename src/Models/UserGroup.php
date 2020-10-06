<?php

namespace LaravelScaffold\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserGroup extends Model
{
    use HasFactory;

    public function permissions()
    {
        return $this->hasMany(UserGroupPermission::class);
    }
}
