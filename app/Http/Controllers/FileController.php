<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;

class FileController extends Controller
{
    public function index($code, File $file)
    {

        $file = $file->where('code', $code)->with('user')->firstOrFail();
        //dd($file->user);

        // viewed increment
        $file->viewedIncrement();

        return view('file', [
            'file' => $file,
        ]);
    }
}
