<?php

namespace LaravelScaffold\Responses;

class UnauthorizedResponse extends ApiResponse
{
    protected $statusCode = 401;
    protected $success = false;
    protected $defaultMessage = "You don't have permission :(";
    protected $errors = [
        "Permission" => "You don't have enough permissions to do this!"
    ];
}
