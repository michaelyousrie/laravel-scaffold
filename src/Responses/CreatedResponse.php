<?php

namespace LaravelScaffold\Responses;

class CreatedResponse extends ApiResponse
{
    protected $success = true;
    protected $statusCode = 201;

    public function getDefaultMessage()
    {
        return __("scaffold::responses.created");
    }
}
