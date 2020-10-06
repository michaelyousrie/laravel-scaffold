<?php

namespace LaravelScaffold\Helpers;

use Illuminate\Http\UploadedFile;

class FileUploader
{
    public static function upload(UploadedFile $file, string $location = "documents")
    {
        $location = "public/{$location}";

        return $file->store($location);
    }
}
