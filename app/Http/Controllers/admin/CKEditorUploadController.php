<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CKEditorUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'upload' => 'required|image',
        ]);

        $path = $request
            ->file('upload')
            ->store('uploads', ['disk' => 'public']);

        return ['url' => getFilePath($path)];
    }
}
