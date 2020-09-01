<?php

namespace LaravelScaffold\Responses;

class InternalServerErrorResponse extends ApiResponse
{
    protected $statusCode = 500;
    protected $defaultMessage = "Uh oh... we got a problem in the server :(";
}
