<?php

namespace LaravelScaffold\Requests;

use LaravelScaffold\Requests\ScaffoldRequest;

class UserLoginRequest extends ScaffoldRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required',
            'password'  => 'required'
        ];
    }
}
