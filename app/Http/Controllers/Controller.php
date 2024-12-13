<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function uploadFile($path, $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = uniqid() . time() . '.' . $extension;
        $dd = $file->storeAs('public/upload/', $filename, 'public');
        return 'upload/' . $filename;
    }

    public function deleteFile($file)
    {
        Storage::disk('public')->delete($file);
    }
}
