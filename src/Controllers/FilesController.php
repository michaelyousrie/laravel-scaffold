<?php

namespace LaravelScaffold\Controllers;

use LaravelScaffold\Helpers\FileUploader;
use LaravelScaffold\Responses\SuccessResponse;
use LaravelScaffold\Requests\UploadFileRequest;

class FilesController extends ScaffoldController
{
    public function handle(UploadFileRequest $request)
    {
        FileUploader::upload($request->file('file'));

        return (new SuccessResponse())
            ->send();
    }
}
