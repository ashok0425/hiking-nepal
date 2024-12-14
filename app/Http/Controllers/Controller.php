<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function uploadFile($path, UploadedFile $file)
    {
        return $file->store($path, ['disk' => 'public']);
    }

    public function deleteFile($file)
    {
        Storage::disk('public')->delete($file);
    }
}
