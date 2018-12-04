<?php

namespace App\Lib;

use Illuminate\Support\Facades\File;

class FileUpload
{
    public function upload($file, $prefix, $path)
    {
        $file_original_name = $file->getClientOriginalName();

        $name = pathinfo($file_original_name, PATHINFO_FILENAME);
        $extension = pathinfo($file_original_name, PATHINFO_EXTENSION);

        // Generating token value...
        $token = str_random(3);

        // Generating new file name...
        $file_name = $file_original_name.'-'.$token.".".$extension;

        // Uploading file...
        $file->move($path, $file_name);

        // Return new file name...
        $data = array(
            'file_name' => $file_name,
            'status'    => true
        );

        return $data;
    }

    public function remove($file, $path)
    {
        // Getting file path...
        $delete_path = $path . $file;
        $deletable = public_path($delete_path);

        // Checking if file exists...
        $exists = File::exists($deletable);
        if($exists)
        {
            // Deleting file
            File::delete($deletable);

            return $data = array(
                'status' => true
            );
        }
        else
        {
            return $data = array(
                'status' => false
            );
        }
    }
}