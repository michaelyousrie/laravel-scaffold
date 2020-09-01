<?php

namespace LaravelScaffold\Responses;

class FailResponse extends ApiResponse
{
    protected $statusCode = 422;
    protected $defaultMessage = "Request failed :(";
}
