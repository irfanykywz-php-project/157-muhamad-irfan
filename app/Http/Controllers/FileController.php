<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index($code, Files $file)
    {

        $file = $file->where('code', $code)->firstOrFail();
        $user = User::where('id', $file['user_id'])->firstOrFail();

        // viewed increment
        $file->viewedIncrement();

        return view('file', [
            'file' => $file,
            'user' => $user
        ]);
    }
}
