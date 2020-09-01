<?php

namespace LaravelScaffold\Responses;

class SuccessResponse extends ApiResponse
{
    protected $success = true;
    protected $statusCode = 200;
    protected $defaultMessage = "Request was successful :)";
}
