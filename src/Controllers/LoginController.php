<?php

namespace LaravelScaffold\Controllers;

use App\Http\Requests\UserLoginRequest;
use LaravelScaffold\Services\UserService;

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
