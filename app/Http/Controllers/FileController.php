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

        // check id_user
        // if id_user not 0 is a registerd user
        if ($file['id_user'] > 0) {
            $user = User::where('id', $file['id_user'])->firstOrFail();
        }else{
            $user = [
                'name' => 'guest'
            ];
        }

        // viewed increment
        $file->viewedIncrement();

        return view('file', [
            'file' => $file,
            'user' => $user
        ]);
    }
}
