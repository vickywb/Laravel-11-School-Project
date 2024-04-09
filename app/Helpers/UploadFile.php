<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
    public function __construct($file, array $params = [], $request) {

        $extension = ! empty($params['extension']) ? $params['extension'] : 'txt';

        $fileName = Str::random(16);

       // Define the path by which we will store the new image
        $fullFileName = 'file' . '/' . $fileName . '.' . $extension;
        if (isset($params['location'])) {
            $fullFileName = 'file' . '/' . $params['location'] . $fileName . '.' . $extension;
        }

        //Store file in the public storage
        Storage::put($fullFileName, (string)$file, 'public');

        // Merge the filename to column to request
        $request->merge([
            $params['field_name'] => $fullFileName
        ]);
        
        // Merge filename
        if (isset($params['filename'])) {
            $request->merge([
                'filename' => $request->name . '_' . $fileName . '.' . $extension
            ]);
        }
    }
}