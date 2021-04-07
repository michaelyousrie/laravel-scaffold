<?php

namespace LaravelScaffold\Responses;

class InternalServerErrorResponse extends ApiResponse
{
    protected $statusCode = 500;

    public function getDefaultMessage()
    {
        return __("scaffold::responses.internal_server_error");
    }
}
