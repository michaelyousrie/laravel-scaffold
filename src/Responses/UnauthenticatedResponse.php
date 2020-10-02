<?php

namespace LaravelScaffold\Responses;

class UnauthenticatedResponse extends ApiResponse
{
    protected $statusCode = 401;
    protected $success = false;

    public function getErrors(): array
    {
        return [
            "Authentication" => __("responses.login_required")
        ];
    }

    public function getDefaultMessage()
    {
        return __("responses.login_required");
    }
}
