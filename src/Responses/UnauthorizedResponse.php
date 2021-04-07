<?php

namespace LaravelScaffold\Responses;

class UnauthorizedResponse extends ApiResponse
{
    protected $statusCode = 401;
    protected $success = false;

    public function getMessage()
    {
        return __("scaffold::responses.not_enough_permissions");
    }

    public function getErrors(): array
    {
        return [
            'Permission'        => __("scaffold::responses.not_enough_permissions")
        ];
    }
}
