<?php

namespace LaravelScaffold\Responses;

class NotFoundResponse extends ApiResponse
{
    protected $statusCode = 404;
    protected $defaultMessage = "Resource was NOT found :(";
}
