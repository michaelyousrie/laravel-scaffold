<?php

namespace LaravelScaffold\Controllers;

use App\Http\Requests\CreateUserRequest;
use LaravelScaffold\Services\UserService;

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
