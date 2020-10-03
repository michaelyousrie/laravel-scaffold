<?php

namespace LaravelScaffold\Controllers;

use App\Http\Requests\UploadFileRequest;
use LaravelScaffold\Helpers\FileUploader;
use LaravelScaffold\Responses\SuccessResponse;

class FilesController extends ScaffoldController
{
    public function handle(UploadFileRequest $request)
    {
        FileUploader::upload($request->file('file'));

        return (new SuccessResponse())
            ->send();
    }
}
