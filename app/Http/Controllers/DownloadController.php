<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function index($code)
    {

        $file = Files::where('code', $code)->firstOrFail();

        return view('download', [
            'file' => $file
        ]);
    }

    public function download($code)
    {
        $file = Files::where('code', decrypt($code))->firstOrFail();

        return Storage::download($file['path'], $file['name']);
    }
}
