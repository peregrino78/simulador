<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function file(Request $request)
    {
        $link = $request->get('link');

        $file = \Storage::disk('local')->get($link);
        $mimetype = \Storage::disk('local')->mimeType($link);

        return response($file, 200)->header('Content-Type', $mimetype);
    }

    public function fileDownload(Request $request)
    {
        $link = $request->get('link');
        $name = $request->get('name');

        $file = \Storage::disk('local')->get($link);
        $mimetype = \Storage::disk('local')->mimeType($link);

        return \Storage::download($link, $name);
    }
}
