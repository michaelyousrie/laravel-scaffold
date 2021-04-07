<?php

namespace LaravelScaffold\Responses;

class UnauthenticatedResponse extends ApiResponse
{
    protected $statusCode = 401;
    protected $success = false;

    public function getErrors(): array
    {
        return [
            "Authentication" => __("scaffold::responses.login_required")
        ];
    }

    public function getDefaultMessage()
    {
        return __("scaffold::responses.login_required");
    }
}
