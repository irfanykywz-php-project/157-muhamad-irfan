<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Files;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilePublicController extends Controller
{
    public function index($name)
    {

        $user = User::where('name', $name)->firstOrFail();

        $total_files = Files::where('user_id', $user['id'])->count();
        $total_download = Files::where('user_id', $user['id'])->sum('downloaded');


        return view('user.profile-public', [
            'user' => $user,
            'total_files' => $total_files,
            'total_download' => $total_download
        ]);
    }
}
