<?php

namespace LaravelScaffold\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class AbstractUser extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
