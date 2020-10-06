<?php

namespace LaravelScaffold\Helpers;

use Illuminate\Http\UploadedFile;

class FileUploader
{
    public static function upload(UploadedFile $file, string $location = "documents")
    {
        return $file->store(public_path($location));
    }
}
