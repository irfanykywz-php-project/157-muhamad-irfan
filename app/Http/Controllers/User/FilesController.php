<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function index()
    {
        return view('user.files', [
            'files'=> Files::all()->where('user_id', Auth::id())
        ]);
    }
}
