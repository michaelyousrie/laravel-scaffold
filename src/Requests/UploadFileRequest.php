<?php

namespace LaravelScaffold\Requests;

class UploadFileRequest extends ScaffoldRequest
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
            'file'      => 'required|file|mimes:jpg,jpeg,png'
        ];
    }
}
