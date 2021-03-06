<?php

namespace LaravelScaffold\Responses;

abstract class ApiResponse
{
    protected $errors = null;
    protected $statusCode;
    protected $message = null;
    protected $headers = [];
    protected $success = false;
    protected $data = [];

    public function __construct(string $message = null)
    {
        $this->message = $message;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;

        return $this;
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function addDataItem(string $key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    public function setErrors(array $errors)
    {
        $this->errors = $errors;

        return $this;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    public function setStatus(int $statusCode)
    {
        $this->status = $statusCode;

        return $this;
    }

    public function send()
    {
        if (is_null($this->message)) {
            $this->message = $this->getDefaultMessage();
        }

        if (empty($this->errors)) {
            $this->errors = $this->getErrors();
        }

        $responseData = [
            'success'   => $this->success,
            'message'   => $this->message,
            'data'      => $this->data,
            'errors'    => $this->errors
        ];

        return response()->json($responseData, $this->statusCode, $this->headers);
    }

    public function getDefaultMessage()
    {
        return __('responses.default');
    }

    public function getErrors(): array
    {
        return [];
    }
}
