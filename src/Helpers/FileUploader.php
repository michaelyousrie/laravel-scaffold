<?php

namespace LaravelScaffold\Helpers;

use Illuminate\Http\UploadedFile;

class FileUploader
{
    public static function upload(UploadedFile $file, string $location = "public/documents")
    {
        return $file->store($location);
    }
}
