<?php

namespace App\Helpers;

use Psr\Http\Message\UploadedFileInterface;

class FileUploadHelper
{
    /**
     * Upload a file with validation and return a Result.
     *
     * @param UploadedFileInterface $uploadedFile The uploaded file from the request
     * @param array $config Configuration options:
     *   - 'directory' (string): Upload directory path (required)
     *   - 'allowedTypes' (array): Array of allowed media types (required)
     *   - 'maxSize' (int): Maximum file size in bytes (required)
     *   - 'filenamePrefix' (string): Prefix for generated filenames (default: 'upload_')
     * @return Result Success with filename, or failure with error message
     */
    public static function upload(UploadedFileInterface $uploadedFile, array $config): Result
    {
        // You'll implement the method body in the following steps
        
    }
}
