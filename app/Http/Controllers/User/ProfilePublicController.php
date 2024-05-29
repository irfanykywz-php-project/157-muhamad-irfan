<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilePublicController extends Controller
{
    public function index($name, User $user)
    {

        $user = $user->where('name', $name)->with('files')->firstOrFail();

        $total_files = $user->files->count();
        $total_download = $user->files->sum('downloaded');
        $level = $this->level($total_download);

        return view('user.profile-public', [
            'user' => $user,
            'total_files' => $total_files,
            'total_download' => $total_download,
            'level' => $level
        ]);
    }
}
