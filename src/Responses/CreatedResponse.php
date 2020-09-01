<?php

namespace LaravelScaffold\Responses;

class CreatedResponse extends ApiResponse
{
    protected $success = true;
    protected $statusCode = 201;
    protected $defaultMessage = "Resource Created Successfully :)";
}
