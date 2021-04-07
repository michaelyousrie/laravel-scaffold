<?php

namespace LaravelScaffold\Responses;

class FailResponse extends ApiResponse
{
    protected $statusCode = 422;

    public function getDefaultMessage()
    {
        return __("scaffold::responses.fail");
    }
}
