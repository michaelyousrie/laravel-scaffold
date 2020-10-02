<?php

namespace LaravelScaffold\Responses;

class SuccessResponse extends ApiResponse
{
    protected $success = true;
    protected $statusCode = 200;

    public function getDefaultMessage()
    {
        return __("responses.success");
    }
}
