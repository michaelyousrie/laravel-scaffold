<?php

namespace LaravelScaffold\Abstracts;

use Illuminate\Foundation\Http\FormRequest;
use LaravelScaffold\Responses\FailResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class AbstractApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errors = array();

        foreach ($validator->errors()->all([':key', ':message']) as $field_errors) {
            $errors[$field_errors[0]] = $field_errors[1];
        }

        throw new HttpResponseException(
            (new FailResponse)
                ->setErrors($errors)
                ->send()
        );
    }
}
