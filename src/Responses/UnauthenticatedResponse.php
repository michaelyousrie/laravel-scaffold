<?php

namespace LaravelScaffold\Responses;

class UnauthenticatedResponse extends ApiResponse
{
    protected $statusCode = 401;
    protected $success = false;
    protected $defaultMessage = "You must be logged in :(";
    protected $errors = [
        "Authentication" => "You need to be logged in!"
    ];
}
