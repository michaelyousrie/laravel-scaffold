<?php

namespace LaravelScaffold\Controllers;

use LaravelScaffold\Services\UserService;
use LaravelScaffold\Requests\UserLoginRequest;

class LoginController extends ScaffoldController
{
    private $_service;

    public function __construct(UserService $userService)
    {
        $this->_service = $userService;
    }

    public function handle(UserLoginRequest $request)
    {
        return $this->_service->login($request);
    }
}
