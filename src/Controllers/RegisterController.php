<?php

namespace LaravelScaffold\Controllers;

use LaravelScaffold\Services\UserService;
use LaravelScaffold\Requests\CreateUserRequest;

class RegisterController extends ScaffoldController
{
    private $_service;

    public function __construct(UserService $userService)
    {
        $this->_service = $userService;
    }

    public function handle(CreateUserRequest $request)
    {
        return $this->_service->createUser($request);
    }
}
