<?php

namespace LaravelScaffold\Controllers;

use LaravelScaffold\Services\UserService;
use LaravelScaffold\Resources\UserResource;
use LaravelScaffold\Requests\CreateUserRequest;

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
