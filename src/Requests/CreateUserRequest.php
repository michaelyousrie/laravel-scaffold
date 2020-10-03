<?php

namespace LaravelScaffold\Requests;

class CreateUserRequest extends ScaffoldRequest
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
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:3|max:15',
            'mobile'    => 'required|unique:users,mobile|regex:/^2?01[0-9]{9}$/i'
        ];
    }
}
