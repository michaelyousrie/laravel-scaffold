<?php

namespace LaravelScaffold\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Requests\CreateUserRequest;
use LaravelScaffold\Services\UserService;

class UsersController extends ScaffoldController
{
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
        $this->resource = UserResource::class;
    }

    public function loggedin()
    {
        return $this->service->getLoggedIn();
    }

    public function store(CreateUserRequest $request)
    {
        return $this->service->createUser($request);
    }
}
