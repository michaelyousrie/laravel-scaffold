<?php

namespace LaravelScaffold\Responses;

class NotFoundResponse extends ApiResponse
{
    protected $statusCode = 404;

    public function getDefaultMessage()
    {
        return __("responses.not_found");
    }
}
